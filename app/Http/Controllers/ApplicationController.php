<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Application;
use App\Http\Requests\ApplicationRequest;
use App\Devteam;
use App\Host;
use App\Environment;
use App\Business;
use Datatables;
use DB;


class ApplicationController extends Controller
{

    /**
     * Constructor
     */
     public function __construct()
     {

        //
     }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        // Get all applications
        // $applications = Application::orderBy('name', 'ASC')->paginate(10);

        // return view('applications.index', compact('applications'));
        // 
        // 

       return view('applications.index');

    }



    /**
     * Datatables resource
     *
     * @return Response
     */
    public function datatable()
    {


        $applications = DB::table('applications')
                    ->join('businesses', 'businesses.id', '=', 'applications.business_id')
                    ->join('environments', 'environments.id', '=', 'applications.environment_id')
                    ->join('devteams', 'devteams.id', '=', 'applications.devteam_id')
                    ->select('applications.id as appid', 
                             'applications.name as appname', 
                             'environments.id as envid', 
                             'environments.name as envname',
                             'devteams.id as devid', 
                             'devteams.name as devname',
                             'businesses.id as busid',
                             'businesses.name as busname');


         return Datatables::of($applications)
            ->editColumn('appname','<a href="/applications/{{ $appid }}">{{ $appname }}</a>')
            ->editColumn('envname','<a href="/environments/{{ $envid }}">{{ $envname }}</a>')
            ->editColumn('devname','<a href="/devteams/{{ $devid }}">{{ $devname }}</a>')
            ->editColumn('busname','<a href="/businesses/{{ $busid }}">{{ $busname }}</a>')
            ->make(true);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        // Get json array of allHosts
        // These wll be used for search ahead on application create form
        // 
        // TODO:  Change this to ->lists('name', 'id');
        // and refactor search-ahead to use name/id value pairs in the 
        // select listbox
        $allHosts = Host::lists('hostname');
        $allHosts = $allHosts->toArray();


        // Get collection of devteam names and ids to populate html selection
        $devteams = Devteam::orderBy('name')->lists('name', 'id');
        // Add empty value
        // Need to convert collection to array to add value
        $devteams = ['' => ''] + $devteams->toArray();


        // Get collection of environment names and ids to populate html selection
        $environments = Environment::orderBy('name')->lists('name', 'id');
        // Add empty value 
        // Need to convert collection to array to add value
        $environments = ['' => ''] + $environments->toArray();


        // Get collection of business names and ids to populate html selection
        $businesses = Business::orderBy('name')->lists('name', 'id');
        // Add empty value 
        // Need to convert collection to array to add value
        $businesses = ['' => ''] + $businesses->toArray();

        // Empty host list
        // We will use the allHosts collection to populate the search-ahead list
        $hosts = [];

        return view('applications.create', compact('devteams', 'businesses', 'environments', 'allHosts', 'hosts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApplicationRequest $request
     * @return Response
     */
    public function store(ApplicationRequest $request)
    {

        // Application::create($request->all());
        $application = Application::create($request->all());

        
        // TODO:  Refactor the search-ahead to use id/name in the select
        //  and do away with the name-to-id conversion here

        // Get host names from request
        $hosts = $request->hosts;

        // Pass to getHostIds static function defined in Model
        $hostIds = Application::getHostIds($hosts);

        // Update hosts in pivit table
        $application->hosts()->sync($hostIds);

        // TODO: get the created application and send to show() rather than index()
        // return view('applications.show')->with('application', $application);
        return redirect('applications');



  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('applications.show', compact('application'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $application = Application::findOrNew($id);

        // Get json array of allHosts
        // These wll be used for search ahead on application create form
        // 
        // TODO:  Change this to ->lists('name', 'id');
        // and refactor search-ahead to use name/id value pairs in the 
        // select listbox
        $allHosts = Host::lists('hostname');
        $allHosts = $allHosts->toArray();

        // Get hosts associated with this application.  
        // This will populate the hosts multiple select list box
        // 
        // TODO:  Change this to ->lists('name', 'id');
        // and refactor search-ahead to use name/id value pairs in the 
        // select listbox
        $hosts = $application->hosts->lists('hostname', 'hostname');        

        // Get collection of all devteams names and ids to populate html selection
        $devteams = Devteam::orderBy('name')->lists('name', 'id');
        // Add empty value 
        // Need to convert collection to array to add value
        $devteams = ['' => ''] + $devteams->toArray();

        // Get collection of all environments names and ids to populate html selection
        $environments = Environment::orderBy('name')->lists('name', 'id');
        // Add empty value 
        // Need to convert collection to array to add value
        $environments = ['' => ''] + $environments->toArray();

        // Get collection of all businesses names and ids to populate html selection
        $businesses = Business::orderBy('name')->lists('name', 'id');
        // Add empty value 
        // Need to convert collection to array to add value
        $businesses = ['' => ''] + $businesses->toArray();


        return view('applications.edit', compact('application', 'devteams', 'businesses', 'environments','allHosts', 'hosts'));


    }




    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ApplicationRequest $request)
    {

        // Get application
        $application = Application::findOrFail($id);


        // TODO:  Refactor the search-ahead to use id/name in the select
        //  and do away with the name-to-id conversion here

        // Get host names from request
        $hosts = $request->hosts;

        // Pass to getHostIds static function defined in Model
        $hostIds = Application::getHostIds($hosts);

        // Update hosts in pivit table
        $application->hosts()->sync($hostIds);



        // Update the application
        $application->update($request->all());

        // Get associated devteam
        $devteam = $application->devteam;

        // Get the associated environment
        $environment = $application->environment;

        // Get the associated business
        $business = $application->business;

        // Get the associated hosts
        $hosts = $application->hosts;

        // Return to the application view
        return view('applications.show', compact('application', 'devteam', 'hosts', 'environment', 'business'));
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Application::destroy($id);

        return redirect('applications');
    }
}
