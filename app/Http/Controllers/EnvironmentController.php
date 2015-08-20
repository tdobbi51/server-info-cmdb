<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Environment;
use App\Http\Requests\EnvironmentRequest;

class EnvironmentController extends Controller
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

        // Get all environments
        $environments = Environment::orderBy('name', 'ASC')->get();
        return view('environments.index', compact('environments'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('environments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EnvironmentRequest $request
     * @return Response
     */
    public function store(EnvironmentRequest $request)
    {

        Environment::create($request->all());

        return redirect('environments');

    //  TODO: get the created environment and send to show() rather than index()
    //  return view('environments.show')->with('environment', $environment);

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $environment = Environment::findOrFail($id);
        $applications = $environment->applications;

        return view('environments.show', compact('environment', 'applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $environment = Environment::findOrNew($id);

        return view('environments.edit', compact('environment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, EnvironmentRequest $request)
    {

        $environment = Environment::findOrFail($id);

        $environment->update($request->all());

        $applications = $environment->applications;

        return view('environments.show', compact('environment', 'applications'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Environment::destroy($id);

        return redirect('environments');
    }
}
