@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update pipe  &nbsp; <small>(Add a new sensor)</small></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pipe_update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="pipe_id" class="col-md-4 col-form-label text-md-right">Pipe id</label>

                            <!-- <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    select pipe
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($pipeId as $pipeIdData)
                                    <a class="dropdown-item" href="#">{{$pipeIdData}}</a>
                                    @endforeach
                                </div>

                            </div> -->
                            <div class="col-md-6">
                            <select name="pipe_id" class="form-control" id="sel1">
                                @foreach($pipeId as $pipeIdData)
                                    <option>{{$pipeIdData}}</option>
                                 @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sensors_id" class="col-md-4 col-form-label text-md-right">Sensor id</label>

                            <div class="col-md-6">
                                <input id="sensors_id" type="number" class="form-control @error('sensors_id') is-invalid @enderror" name="pipe_sensors_id" required autocomplete="current-sensors_id">

                                @error('sensors_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                 Submit
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
