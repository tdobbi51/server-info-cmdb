<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Host;
use Excel;

class ExcelController extends Controller
{

    /**
     * Constructor
     */
     public function __construct() 
     {

        //
     }
     

    /**
     * Download hosts table to excel file.
     *
     */
    public function exportHosts()
    {
        
        $hosts = Host::all();

        Excel::create('Hosts', function($excel) use($hosts) {

            $excel->sheet('Hosts', function($sheet) use($hosts) {

                $sheet->fromModel($hosts);

            });

        })->export('xls');



    }



}
