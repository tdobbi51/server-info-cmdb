<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Host;
use Datatables;

class HostController extends Controller
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
        

        return view('hosts.index');
    }


    /**
     * Datatables resource
     *
     * @return Response
     */
    public function datatable()
    {

        $hosts = Host::select(['id',
                               'hostname', 
                               'os_type', 
                               'os_version', 
                               'os_revision', 
                               'cpus',
                               'cores',
                               'speed',
                               'memory',
                               'storage']);

         return Datatables::of($hosts)
            ->editColumn('hostname','<a href="/hosts/{{ $id }}">{{ $hostname }}</a>')
            ->make(true);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $host = Host::findOrFail($id);

        return view('hosts.show', compact('host'));
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
