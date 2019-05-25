<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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



        // Log::info('Sensor  data.',  ['data' => $request] );
    

       

  //fetch values wanted from request header
  $censor_id = $request->input('censor_id');
  $longitude = $request->input('longitude');
  $latitude = $request->input('latitude');
  $water_pressure_timestamp = $request->input('water_pressure_timestamp');
  $water_pressure = $request->input('water_pressure');

        //check from sensores table if sencor exists
        $sensors_exist = DB::select('select * from sensorsTable where sensor_id ='.$censor_id );

        if(empty($sensors_exist)){

          
            //insert a row into sensorsrs table
            DB::insert('insert into sensorsTable (sensor_id,longitude,latitude ) values(?, ?,?)',[$censor_id, $longitude ,$latitude]);

            echo "Record inserted successfully into sensorsTable";


            //create a table for that sensor
            //query to create table
            $tableQuery = '
            CREATE TABLE `'.$censor_id.'` (
                `id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
                `'.$water_pressure_timestamp.'`	INTEGER NOT NULL,
                `'.$water_pressure.'`	INTEGER NOT NULL
            );
            ';

            DB::raw($tableQuery);
            echo "table created";


            //insert into the table
            DB::insert('insert into `'.$censor_id.'` (water_pressure_timestamp,water_pressure ) values(?, ?)',[ $water_pressure_timestamp ,$water_pressure]);
            echo "Record inserted successfully into ".$censor_id;
      
        }else{
            //insert into the table
           
            DB::insert('insert into `'.$censor_id.'` (water_pressure_timestamp,water_pressure ) values(?, ?)',[ $water_pressure_timestamp ,$water_pressure]);
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
