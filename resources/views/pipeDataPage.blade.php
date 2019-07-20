

@extends('layout')

@section('content')

<br><br><br><br>
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

                        <h1>Pipes Data Instances</h1>

                        <table class="table">

                        <tbody>

                    @foreach($arrayOfOneSensorData[0] as $arrayOfOneSensorData)
                        @php  $data =  $loop->iteration  @endphp
                       
                       
                      <tr>
                      <td> 
                        <a href= "{{ route('get_measure_instance_data', [ 'pipe_id' => $pipe_id , 'measure_instance' => $data-1   ])}}">
                        Instance {{$data}}
                        </a>    
                        </td>
                      </tr>
                       
                        @endforeach
           
                        <tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
