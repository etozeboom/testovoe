@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doors</div>
                <div class="doors">
                    <script>/*
                        class Popup {
                        constructor(options) {
                            this.modal = document.querySelector(options.modal);
                            this.overlay = document.querySelector(options.overlay);
                            var popup = this;
                            this.open = function () {
                                //popup.modal.append = content;
                                //popup.door_id.innerHTML = content;
                                popup.overlay.classList.add('open');
                                popup.modal.classList.add('open');
                            };
                            this.close = function () {
                                popup.overlay.classList.remove('open');
                                popup.modal.classList.remove('open');
                                popup.modal.classList.remove('open');
                            };
                            this.overlay.onclick = popup.close;
                        }
                    }*/
                    </script>
                    @foreach($doors as $door)
                        <a id="{{ $door->id}}"  class="door{{ $door->id}} btn">{{ $door->name}}</a>

                        <div class="modal{{ $door->id}} modal">
                            <form method="POST" action="{{ route('index') }}">
                                @csrf

                                <div class="form-group row justify-content-center">
                                    <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Username') }}</label>

                                    <div class="col-md-8 align-self-center">
                                        <input  disabled="disabled" id="name{{ $door->id}}" type="name" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="name" value="{{  $request->user()->first()->name }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <label for="password" class="col-md-12 col-form-label text-md-center">{{ __('Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password{{ $door->id}}" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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

                                        <input type="hidden" name="door_id" value=' {{$door->id}}'>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <script>window.onload = function(){
                            var p{{$door->id}} = new Popup({
                                modal: '.modal{{$door->id}}',
                                overlay: '.overlay',
                            });
                            document.querySelector('.doors .door{{$door->id}}').onclick = function(){
                                p{{$door->id}}.open();
                            };}
                        </script>
                    @endforeach
                </div>
               
                <div class="overlay"></div>
            </div>
        </div>
    </div>
</div>

@endsection
