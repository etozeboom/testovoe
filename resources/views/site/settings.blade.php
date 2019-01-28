@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>
                
                    <form method="POST" action="{{ route('settings') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group row justify-content-center">
                            <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Username') }}</label>

                            <div class="col-md-8 align-self-center">
                                <input id="name" type="name" class="form-control" name="name" @if (Auth::check()) value="@if(null != old('name')){{old('name')}}@else{{Auth::user()->name}}@endif" @endif required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row justify-content-center">
                            <label for="email" class="col-md-12 col-form-label text-md-center">{{ __('Email') }}</label>

                            <div class="col-md-8 align-self-center">
                                <input id="email" type="email" class="form-control" name="email" @if (Auth::check()) value="@if(null != old('email')){{old('email')}}@else{{Auth::user()->email}}@endif" @endif required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="newpassword" class="col-md-12 col-form-label text-md-center"> new password</label>

                            <div class="col-md-8">
                                <input id="newpassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="newpassword" >

                                @if ($errors->has('new_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="newpassword_confirmation" class="col-md-12 col-form-label text-md-center"> new password confirmation</label>

                            <div class="col-md-8">
                                <input id="newpassword_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="newpassword_confirmation" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="password" class="col-md-12 col-form-label text-md-center"> Current password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if (isset($status) )
                            <div class="alert alert-danger" role="alert">
                                {{ $status }}
                            </div>
                        @endif
                        @if (isset($messages) )
                            <div class="alert alert-success" role="alert">
                            @foreach($messages as $message)
                                 {{ $message }}
                            @endforeach
                            </div>
                        @endif
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>

                            </div>
                        </div>

                    </form>
               
            </div>
        </div>
    </div>
</div>
@endsection
