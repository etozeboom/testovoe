@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doors</div>
                <div class="doors">
                    @foreach($doors as $door)
                    <a id="{{ $door->id}}"  class="door{{ $door->id}} btn">{{ $door->name}}</a>
                    @endforeach
                </div>
                <div class="modal">
                    <form method="POST" action="{{ route('index') }}">
                            @csrf

                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Username') }}</label>

                                <div class="col-md-8 align-self-center">
                                    <input  disabled="disabled" id="name" type="name" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="name" value="{{  $request->user()->first()->name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="password" class="col-md-12 col-form-label text-md-center">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Check') }}
                                    </button>

                                    <div class="door_id"></div>
                                </div>
                            </div>

                        </form>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function(){
        var p = new Popup({
            modal: '.modal',
            overlay: '.overlay',
            form: '.modal form',
            door_id: '.modal form .door_id',
        });

        var inputs = document.querySelectorAll('.doors .btn');
    
        //alert(inputs.length);
        for(var i = 1; i < inputs.length+1; i++){
            //alert(i);
            document.querySelector('.doors .door'+i).onclick = function(){
             p.open('<input type="hidden" name="door_id" value="'+i+'">');
            };
        }
                
            
       

    }
</script>
@endsection
