<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class pipeController extends Controller
{


    public function registerNewPipe(Request $request)
    {
        //fetch values wanted from request header
        $pipe_id = $request->input('pipe_id');
        $sensor_ids = $request->input('pipe_sensors_id');



        $ids = implode(', ', $sensor_ids);

       

//check if sensors table exsit if not create
foreach($sensor_ids as $anId){
    echo "checking table fo id".$anId;
    if (!Schema::hasTable($anId)) {
        echo "creating  table fo id".$anId;


       
        Schema::connection('mysql')->create($anId, function($table)
            {
                $table->increments('id')->index();
                $table->string('water_pressure_timestamp');
                $table->string('water_pressure');
                $table->timestamps();
                    
            });
    

    }
}


       
          //insert a row into pipes  table 
        DB::insert('insert into pipeTable (pipe_id,pipe_sensors_id,created_at, updated_at ) values(?,?,?,?)',[$pipe_id, $ids,  date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

       
    }


    //list measure instance for the pip sensors
    public function getMeasureInstanceList(Request $request){



        $pipe_id = $request->pipe_id ;
        
        // return view('home');
        $sensorsid = DB::select('SELECT pipe_sensors_id FROM `pipeTable` where pipe_id ='. $pipe_id);
        
        $myArrayOfSensorIds = explode(',', $sensorsid[0]->pipe_sensors_id);
        $arrayOfOneSensorData= array();

        foreach ( $myArrayOfSensorIds as $value){ 

            $tableNameInt = (int)$value; 
           
           $specificSensorData = DB::select('SELECT * FROM `'.$tableNameInt.'`');
            

            array_push($arrayOfOneSensorData, $specificSensorData);
            break;
        } 


        return view('pipeDataPage')
        ->with("pipe_id",$pipe_id)
        ->with("arrayOfOneSensorData",$arrayOfOneSensorData);
    }

    public function getSensorsForThisPipe(Request $request)
    {

        $pipe_id = $request->pipe_id ;
        $measure_instance = $request->measure_instance ;
        
        // return view('home');
        $sensorsid = DB::select('SELECT pipe_sensors_id FROM `pipeTable` where pipe_id ='. $pipe_id);
        
    

        $myArrayOfSensorIds = explode(',', $sensorsid[0]->pipe_sensors_id);
         $allSensorData= array();
        

        foreach ( $myArrayOfSensorIds as $value){ 

            $tableNameInt = (int)$value; 
           
           $specificSensorData = DB::select('SELECT * FROM `'.$tableNameInt.'`');
            

            array_push($allSensorData, $specificSensorData);
        } 

        Log::info("An array of sensor s ", $sensorsid);
        Log::info("An array of sensor id with array of the sensors data ", $allSensorData);



        // print_r($allSensorData[0][0]->water_pressure_timestamp);
        // print_r($allSensorData[0][0]->water_pressure);

        // <td> {{$}} </td>

        return view('pipeDatMeasureInstance')
        ->with("sensorsid",$myArrayOfSensorIds)
        ->with("sensorsList",$myArrayOfSensorIds)
        ->with("measureInstance",$measure_instance)
        ->with("allSensorData",$allSensorData);
    }
}
