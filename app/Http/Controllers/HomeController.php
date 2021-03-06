<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $sensorData = DB::select('SELECT * FROM `sensorsTable`');
        $pipeData = DB::select('SELECT * FROM `pipeTable`');
     
        //Log::info("table value", $sensorData);

        return view('home')
        ->with("sensorData",$sensorData)
        ->with("pipeData",$pipeData);
    }
    
}
