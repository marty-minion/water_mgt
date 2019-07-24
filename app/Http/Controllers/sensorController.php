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
        $censor_id = $request->input('censor_id');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $water_pressure_timestamp = $request->input('water_pressure_timestamp');
        $water_pressure = $request->input('water_pressure');
        $pipe_id = $request->input('pipe_id');

        //check from sensores table if sencor exists
       // 
       
       $sensors_exist = DB::select('select * from sensorsTable where sensor_id ='.$censor_id );


     
       
       if (!Schema::hasTable($censor_id)) {
            // Code to create table
        
            //insert a row into sensorsrs table
           // DB::insert('insert into sensorsTable (sensor_id,longitude,latitude,created_at, updated_at,pipe_id ) values(?,?,?,?,?,?)',[$censor_id, $longitude ,$latitude, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $pipe_id]);

           if(empty($sensors_exist)){
            //insert
            // DB::insert('insert into `sensorsTable` ( `sensor_id`,`longitude`,`latitude`,`created_at`, `updated_at`,`pipe_id` ) values(?,?,?,?,?,?)',[$censor_id, $longitude ,$latitude, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $pipe_id]);
    
            $today = date("Y-m-d H:i:s");

    //   DB::insert('insert into `sensorsTable` ( `sensor_id`,`longitude`,`latitude`,`pipe_id` ) values('.$censor_id.', '.$longitude.' ,'.$latitude.','.$pipe_id );
    DB::table('sensorsTable')->insert(
        [
            'sensor_id' => $censor_id,
             'longitude' => $longitude,
             'latitude' => $latitude, 
             'pipe_id' => $pipe_id
        ]
    );
    }

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
           if(empty($sensors_exist)){
            //insert
            DB::insert('insert into sensorsTable (sensor_id,longitude,latitude,created_at, updated_at,pipe_id ) values(?,?,?,?,?,?)',[$censor_id, $longitude ,$latitude, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $pipe_id]);
    
         }
            
            DB::insert('insert into `'.$censor_id.'` (water_pressure_timestamp,water_pressure ,created_at, updated_at ) values(?, ?, ? , ?)',[ $water_pressure_timestamp ,$water_pressure, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
            echo "Record inserted successfully into ".$censor_id;
        }
          
    }

   

    public function getASpecificSensorsData(Request $request){

        $sensorData = DB::select('SELECT * FROM `'.$request->sensor_id.'`');
     
        Log::info("table value", $sensorData);

        return view('sensorDataPage')
        ->with("sensorData",$sensorData);

    }
}
