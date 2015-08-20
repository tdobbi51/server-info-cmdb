<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Business;
use App\Http\Requests\BusinessRequest;
use Datatables;

class BusinessController extends Controller
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

        // Get all businesses
        // $businesses = Business::orderBy('name', 'ASC')->get();
        // return view('businesses.index', compact('businesses'));
        return view('businesses.index');
    }


    /**
     * Datatables resource
     *
     * @return Response
     */
    public function datatable()
    {
        $businesses = Business::select(['id',
                                     'name', 
                                     'contact', 
                                     'email']);

         return Datatables::of($businesses)
            ->editColumn('name','<a href="/businesses/{{ $id }}">{{ $name }}</a>')
            ->make(true);

    }    


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BusinessRequest $request
     * @return Response
     */
    public function store(BusinessRequest $request)
    {

        Business::create($request->all());

        return redirect('businesses');

    //  TODO: get the created business and send to show() rather than index()
    //  return view('businesses.show')->with('business', $business);

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $business = Business::findOrFail($id);
        $applications = $business->applications;

        return view('businesses.show', compact('business', 'applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $business = Business::findOrNew($id);

        return view('businesses.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, BusinessRequest $request)
    {

        $business = Business::findOrFail($id);

        $business->update($request->all());

        $applications = $business->applications;

        return view('businesses.show', compact('business', 'applications'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Business::destroy($id);

        return redirect('businesses');
    }
}
