<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Devteam;
use App\Http\Requests\DevteamRequest;
use Datatables;

class DevteamController extends Controller
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
        // Get all devteams
        // $devteams = Devteam::orderBy('name', 'ASC')->get();
        // return view('devteams.index', compact('devteams'));
        return view('devteams.index');
        
    }


    /**
     * Datatables resource
     *
     * @return Response
     */
    public function datatable()
    {
        $devteams = Devteam::select(['id',
                                     'name', 
                                     'manager', 
                                     'email']);

         return Datatables::of($devteams)
            ->editColumn('name','<a href="/devteams/{{ $id }}">{{ $name }}</a>')
            ->make(true);

    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('devteams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDevteamRequest $request
     * @return Response
     */
    public function store(DevteamRequest $request)
    {

        Devteam::create($request->all());

        return redirect('devteams');

    //  TODO: get the created devtem and send to show() rather than index()
    //  return view('devteams.show')->with('devteam', $devteam);

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $devteam = Devteam::findOrFail($id);
        $applications = $devteam->applications;

        return view('devteams.show', compact('devteam', 'applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $devteam = Devteam::findOrNew($id);

        return view('devteams.edit', compact('devteam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, DevteamRequest $request)
    {

        $devteam = Devteam::findOrFail($id);

        $devteam->update($request->all());

        $applications = $devteam->applications;

        return view('devteams.show', compact('devteam', 'applications'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Devteam::destroy($id);

        return redirect('devteams');
    }
}
