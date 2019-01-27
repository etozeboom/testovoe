@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doors</div>
                <div class="doors">
                    @foreach($doors as $door)
                        <a id="d{{ $door->id}}" class="door btn">{{ $door->name}}

                        <div class="modal{{ $door->id}} modal @if (  (isset($doorId) ? $doorId : 0) ==$door->id) open  @endif" >
                            <form method="POST" action="{{ route('index') }}">
                                @csrf

                                <div class="form-group row justify-content-center">
                                    <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Username') }}</label>

                                    <div class="col-md-8 align-self-center">
                                        <input  disabled="disabled" id="name{{ $door->id}}" type="name" class="form-control" name="name" value="{{  $request->user()->first()->name }}" required autofocus>
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
                                @if (isset($status))
                                    <div class="alert alert-success" role="alert">
                                        {{ $status }}
                                    </div>
                                @endif
                               
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Check') }}
                                        </button>

                                        <input type="hidden" name="door_id" value=' {{$door->id}}'>
                                    </div>
                                </div>

                            </form>
                        </div>
                        </a>
                    @endforeach
                </div>
               
                <div class="overlay {{ isset($doorId) ? 'open' : '' }}"></div>
            </div>
        </div>
    </div>
</div>
@endsection
