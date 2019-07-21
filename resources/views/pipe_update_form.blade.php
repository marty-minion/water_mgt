@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update pipe</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="pipe_number" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="pipe_number" type="number" class="form-control @error('pipe_number') is-invalid @enderror" name="pipe_number" value="{{ old('pipe_number') }}" required autocomplete="pipe_number" autofocus>

                                @error('pipe_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sensors_id" class="col-md-4 col-form-label text-md-right">{{ __('sensors_id') }}</label>

                            <div class="col-md-6">
                                <input id="sensors_id" type="text" class="form-control @error('sensors_id') is-invalid @enderror" name="sensors_id" required autocomplete="current-sensors_id">

                                @error('sensors_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
