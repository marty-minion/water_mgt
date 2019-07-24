

@extends('layout')


@section('content')

<br><br><br><br><br>
<style>

.card { background-color: rgba(255, 255, 255, 1); }

.card-header, .card-footer { opacity: 1}

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pipe Data</div>

                <div class="card-body">
                <table class="table">
                    <thead>

               <tr>
               <th>
                   
                </th> 
               <th>
                   No.
                </th> 
                <th>
                water pressure timestamp
                </th>
                <th>
                water pressure
                </th>
                
                <th>
               difference Pressure
                </th>
                <th>
               difference time
                </th>
               </tr> 
                    </thead> 
                    <tbody>

                   
                    @foreach($sensorsList as $sensorsList)
                        @php  $data =  $loop->iteration  @endphp
                       <tr>
                        <td>Sensor</td>
                       <td scope="col">  {{ $data }}  </td> 
                       <td scope="col">  {{$allSensorData[ $data -1 ][$measureInstance]->created_at }}  </td> 
                       <td scope="col">  {{$allSensorData[ $data -1 ][$measureInstance]->water_pressure }}  </td> 
                      
                       

                       
                        @if( $data-1  > $measureInstance)
                            @php $diff =  $allSensorData[ $data -1 ][$measureInstance]->water_pressure - $allSensorData[ $data -2 ]
                            [$measureInstance]->water_pressure  
                             @endphp
                            <td> {{$diff}} </td>
                         @else 
                            <td>{{$data-1 > 1}}</td>
                         @endif 


                         @if( $data-1  > $measureInstance)
                         @php 
                            $date_one_string = $allSensorData[ $data -1 ][$measureInstance]->created_at; 
                            $date_two_string = $allSensorData[ $data -2 ][$measureInstance]->created_at; 

                          
                            $date_one =  new DateTime($date_one_string);
                            $date_two =  new DateTime($date_two_string);

                            $interval = $date_one->diff($date_two);
                            
                            
                          @endphp
                            <td>@php echo ( $interval->format('H %h')." ".$interval->format('M %i')." ".$interval->format('S %s'));  @endphp    </td>
                         @else 
                            <td>{{$data-1 > 1}}</td>
                         @endif 
                       
                       </tr>   
                                      
                    @endforeach
                   

           

                    </tbody>
                </table>
                   
        

                </div>
            </div>
        </div>
    </div>
</div>

@endsection