<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ProfileController extends Controller
{

    /**
     * Constructor
     */
     public function __construct() 
     {

        //
     }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {

        //$user = User::find($id);
        //$user = User::whereUid($uid)->first();
        //
        
        // Get the authenticated user
        $user = Auth::user();
        return view('users.profile')->with('user', $user);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
