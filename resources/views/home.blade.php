
@extends('layout')

    @section('content')

        <br><br><br><br><br>
        <style>

             .card { background-color: rgba(245, 245, 245, 0.8); }

          .card-header, .card-footer { opacity: 1}

         </style>

                   <div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                   <div class="card-body">
                          @if (session('status'))
                          <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                           </div>
                         @endif

                           <h1>Pipes</h1>

                             @foreach($pipeData as $pipeData)
               
                                  <h5>  id :  {{$pipeData->id}} 
                                      <a href= "{{ route('get_sensors_for_a_pipe', [ 'pipe_id' => $pipeData->pipe_id  ])}}">
                                             Pipe id: {{$pipeData->pipe_id}} 
                                         </a> 
                                    
                                    </h5>
                            
                            @endforeach




                                 <h1>Sensors</h1>
                @foreach($sensorData as $sensorData)
               
                 <h5>  id :  {{$sensorData->id}} 
                  <a href= "{{ route('getASpecificSensorsData', [ 'sensor_id' => $sensorData->sensor_id  ])}}">
                    Sensor id: {{$sensorData->sensor_id}} 
                    </a> 
                 </h5>
                              
                @endforeach


                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
