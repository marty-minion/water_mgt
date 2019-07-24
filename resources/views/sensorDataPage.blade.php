@extends('layout')


@section('content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                 

            
                @foreach($sensorData as $sensorData)
               
                 <h4>  
                 water_pressure_timestamp  :  {{$sensorData->water_pressure_timestamp}} 
                 water_pressure  :  {{$sensorData->water_pressure}} 
                 
                 </h4>
                              
                @endforeach


                </div>
            </div>
        </div>
    </div>
</div>

@endsection