@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pipe Data</div>

                <div class="card-body">
                <table class="table">
                    <thead>



                    @foreach($sensorsid as $sensorsid)
                        
                    <th scope="col">Sensor {{$sensorsid}} </th>                 
                     @endforeach

                    </thead>

                    <tbody>

                  
                  
                     
    
                    </tbody>
                </table>





                      
        

                </div>
            </div>
        </div>
    </div>
</div>

@endsection