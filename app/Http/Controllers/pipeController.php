<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class pipeController extends Controller
{

    public function registerNewPipeGet(Request $request){
        return view('pipe_register_form');
    }

    public function updatePipeGet(Request $request){
        return view('pipe_update_form');
    }
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


    public function updatePipe(Request $request){
        
        //get all sensors 
        $pipe_id = $request->input('pipe_id');
        $new_sensor_id = $request->input('pipe_sensors_id');
        
       
        $sensors = DB::select('select * from pipeTable where pipe_id = ?', [$pipe_id]);
       


        $all_new_sensors = $sensors[0]->pipe_sensors_id.",".$new_sensor_id;

      
        
       DB::update('update pipeTable set pipe_sensors_id = \''.$all_new_sensors.'\' where id = ?', [$sensors[0]->id]);


      
        //get ammouount of dummy data to insert
        $myArray = explode(',', $all_new_sensors);

        $sensors_instances = DB::table($myArray[0])->count();

        print_r($sensors_instances);

        if (!Schema::hasTable($new_sensor_id)) {
            echo "creating  table fo id".$new_sensor_id;
           
            Schema::connection('mysql')->create($new_sensor_id, function($table)
                {
                    $table->increments('id')->index();
                    $table->string('water_pressure_timestamp');
                    $table->string('water_pressure');
                    $table->timestamps();
                        
                });
    
        }else{
            echo "Table exists  ";
        }
    

        for ($x = 1; $x <= $sensors_instances; $x++) {
            echo "Loop Number: $x <br>";

            //insert a row into pipes  table 
            DB::insert('insert into `'.$new_sensor_id.'` (water_pressure_timestamp,water_pressure ,created_at, updated_at  ) values(?, ?, ? ,?)',[ 0 ,0, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
            echo "Record inserted successfully into ".$new_sensor_id;     
        } 



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
