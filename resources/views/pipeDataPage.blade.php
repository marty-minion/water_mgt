

@extends('layout')


@section('content')

<br><br><br><br>
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
                created_at
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
                       <td scope="col">  @php echo $allSensorData[ $data -1][0]->water_pressure_timestamp   @endphp  </td> 
                       <td scope="col">  {{$allSensorData[ $data -1 ][0]->water_pressure }}  </td> 
                       <td scope="col">  {{$allSensorData[ $data -1 ][0]->created_at }}  </td> 
                       

                       
                        @if( $data-1  > 0)
                        @php $diff =  $allSensorData[ $data -1 ][0]->water_pressure_timestamp - $allSensorData[ $data -2 ][0]->water_pressure_timestamp   @endphp
                            <td> {{$diff}} </td>
                         @else 
                            <td>{{$data-1 > 1}}</td>
                         @endif 
                         @if( $data-1  > 0)
                         @php 
                            $date_one_string = $allSensorData[ $data -1 ][0]->created_at; 
                            $date_two_string = $allSensorData[ $data -2 ][0]->created_at; 

                          
                            $date_one =  new DateTime($date_one_string);
                            $date_two =  new DateTime($date_two_string);

                            $interval = $date_one->diff($date_two);
                            
                            
                          @endphp
                            <td>@php echo ( $interval->format('D %i')." ".$interval->format('M %i')." ".$interval->format('S %s'));  @endphp    </td>
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