@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register new pip</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pipe_register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="pipe_number" class="col-md-4 col-form-label text-md-right">Pipe id</label>

                            <div class="col-md-6">
                                <input id="pipe_number" type="number" class="form-control @error('pipe_number') is-invalid @enderror" name="pipe_id" value="{{ old('pipe_number') }}" required autocomplete="pipe_number" autofocus>

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
                                <input id="sensors_id" type="text" class="form-control @error('sensors_id') is-invalid @enderror" name="pipe_sensors_id" required autocomplete="current-sensors_id">

                                @error('sensors_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button  type="submit" id="submitBtn" class="btn btn-primary" >
                               submit
                                </button>
                            </div>
                        </div>


                        <script>


var pipe_number=document.getElementById("pipe_number").value;
var sensors_id=document.getElementById("sensors_id").value;

document.getElementById("submitBtn").addEventListener("click", function(event){
  event.preventDefault()

  xhr = new XMLHttpRequest();
var url = "{{ route('pipe_register') }}";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-type", "application/json");
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        var json = JSON.parse(xhr.responseText);
        console.log(json.email + ", " + json.name)
    }
}
var data = JSON.stringify({"pipe_number": pipe_number ,"name":"["+sensors_id+"]"});
xhr.send(data);





});

                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
