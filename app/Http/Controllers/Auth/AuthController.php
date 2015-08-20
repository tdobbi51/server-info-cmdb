<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Config;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }



    /**
     * Redirect location after successful auth.
     * (if no referral to auth page exists)
     */
    protected $redirectTo = '/';



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'  => 'required|max:50|unique:users',
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }




    /**
     * Handle a login request to the application.
     *
     * NOTE: This method is overriding the same method
     *       in the AuthenticatesAndRegistersUsers trait
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required', 'password' => 'required',
        ]);

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {

            // If we are using adldap for auth services
            // call addOrUpdateUserAccount
            // custom code added by tdobbins
            if ( Config::get('auth.driver') == 'ldap' ) {
                $this->addOrUpdateUserAccount();
            }

            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('username', 'remember'))
            ->withErrors([
                'username' => $this->getFailedLoginMessage(),
            ]);
    }



    /**
     * Get the needed authorization credentials from the request.
     *
     * NOTE: This method is overriding the same method
     *       in the AuthenticatesAndRegistersUsers trait
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    protected function getCredentials(Request $request)
    {
        return $request->only('username', 'password');
    }


    /**
    *  Custom code added by tdobbins
    *
    *  A local user record is maintained for
    *  AD authenticated users.
    *
    *  Create user account on first login,
    *  otherwise update last_login field
    *
    **/
    protected function addOrUpdateUserAccount()
    {

        // Find AD authenticated user in local DB
        $user_in_db = User::where('username', Auth::user()->username)->first();

        // Create user record if not found
        if (!$user_in_db)
        {
            $user = new User;
            $user->username = Auth::user()->username;
            $user->firstname = Auth::user()->firstname;
            $user->lastname = Auth::user()->lastname;
            $user->email = Auth::user()->email;
            $user->last_login = Carbon::now();
            $user->save();
        }
        // Otherwise, update the lastlogon timestamp
        else
        {
            $user_in_db->last_login = Carbon::now();
            $user_in_db->save();

        }
    }



    /**
     * Handle a registration request for the application.
     *
     * NOTE: This method is overriding the same method
     *       in the AuthenticatesAndRegistersUsers trait
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));

        // Now that the user is registered and authenticated
        // get the user object and pass to "registration feedback page"

        $user = Auth::user();
        $username = $user->username;
        $firstname = $user->firstname;
        $lastname = $user->lastname;
        $email = $user->email;

        return view('auth.registered', compact('username', 'firstname', 'lastname', 'email'));

    }




}