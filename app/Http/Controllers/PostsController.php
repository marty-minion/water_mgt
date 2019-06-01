<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// use Illuminate\Database\Schema;
use Illuminate\Support\Facades\Schema;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //The function will be called 
        // when data is post

        //fetch values wanted from request header
        $censor_id = $request->input('censor_id');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $water_pressure_timestamp = $request->input('water_pressure_timestamp');
        $water_pressure = $request->input('water_pressure');

        //check from sensores table if sencor exists
       // $sensors_exist = DB::select('select * from sensorsTable where sensor_id ='.$censor_id );


        if (!Schema::hasTable($censor_id)) {
            // Code to create table
        
            //insert a row into sensorsrs table
            DB::insert('insert into sensorsTable (sensor_id,longitude,latitude,created_at, updated_at ) values(?,?,?,?,?)',[$censor_id, $longitude ,$latitude, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

            echo "Record inserted successfully into sensorsTable";


            Schema::connection('mysql')->create($censor_id, function($table)
            {
                $table->increments('id')->index();;
                $table->string('water_pressure_timestamp');
                $table->string('water_pressure');
                $table->timestamps();
                    
            });
            echo "table created";


            //insert into the table
            DB::insert('insert into `'.$censor_id.'` (water_pressure_timestamp,water_pressure ,created_at, updated_at  ) values(?, ?, ? ,?)',[ $water_pressure_timestamp ,$water_pressure, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
            echo "Record inserted successfully into ".$censor_id;
      
        }else{
            //insert into the table
           
            DB::insert('insert into `'.$censor_id.'` (water_pressure_timestamp,water_pressure ,created_at, updated_at ) values(?, ?, ? , ?)',[ $water_pressure_timestamp ,$water_pressure, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
            echo "Record inserted successfully into ".$censor_id;
        }
      
       

      
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
