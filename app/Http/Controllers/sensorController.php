<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;


class sensorController extends Controller
{
    //post data 
    // dore in db
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSensorData(Request $request)
    {
        //The function will be called 
        // when data is post

        //fetch values wanted from request header
        $sensor_id = $request->input('censor_id');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $water_pressure = $request->input('water_pressure');
        $pipe_id = $request->input('pipe_id');

        //check from sensores table if sensor exists
       // 
       
       $sensors_exist = DB::select('select * from sensorsTable where sensor_id ='. $sensor_id );


     
       //note change of c to s
       if (!Schema::hasTable($sensor_id)) {
            // Code to create table
        
            //insert a row into sensorsrs table
           // DB::insert('insert into sensorsTable (sensor_id,longitude,latitude,created_at, updated_at,pipe_id ) values(?,?,?,?,?,?)',[$censor_id, $longitude ,$latitude, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $pipe_id]);

           if(empty($sensors_exist)){
            //insert
            // DB::insert('insert into `sensorsTable` ( `sensor_id`,`longitude`,`latitude`,`created_at`, `updated_at`,`pipe_id` ) values(?,?,?,?,?,?)',[$censor_id, $longitude ,$latitude, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $pipe_id]);
    
      DB::insert('insert into `sensorsTable` ( `sensor_id`,`longitude`,`latitude`,`created_at`, `updated_at`,`pipe_id` ) values('.$sensor_id.', '.$longitude.' ,'.$latitude.', '.date("Y-m-d H:i:s").', '.date("Y-m-d H:i:s").', '.$pipe_id .'');
         }

            echo "\n Record inserted successfully into sensorsTable";


            Schema::connection('mysql')->create($sensor_id, function($table)
            {
                $table->increments('id')->index();
                $table->string('water_pressure');
                $table->timestamps();
                    
            });
            echo "\n table created";


            //insert into the table
            DB::insert('insert into `'.$sensor_id.'` (water_pressure ,created_at, updated_at  ) values(?, ? ,?)',[$water_pressure, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
            echo "\n Record inserted successfully into ".$sensor_id;
      
        }else{
            //insert into the table
           if(empty($sensors_exist)){
            //insert
            DB::insert('insert into sensorsTable (sensor_id,longitude,latitude,created_at, updated_at,pipe_id ) values(?,?,?,?,?,?)',[$sensor_id, $longitude ,$latitude, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $pipe_id]);
    
         }
            // database will throw an error if water_pressure_timestamp is empty 
            // hence insert current unix time stamp
            $default_water_pressure_timestamp = time();
            DB::insert('insert into `'.$sensor_id.'` (water_pressure_timestamp , water_pressure ,created_at, updated_at ) values(?, ?, ? , ?)',[$default_water_pressure_timestamp, $water_pressure, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
            echo " \n Record inserted successfully into ".$sensor_id;
        }
          
    }
   

    public function getASpecificSensorsData(Request $request){

        $sensorData = DB::select('SELECT * FROM `'.$request->sensor_id.'`');
     
        Log::info("table value", $sensorData);

        return view('sensorDataPage')
        ->with("sensorData",$sensorData);

    }
}
