@extends('layouts.admin')

@section('header')

	@include('admin.header')

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @php
               // dump(route('usersEdit',['users'=>$user->id]));
            @endphp
{!! Form::open(['url' => (isset($user->id)) ? route('usersEdit',['users'=>$user->id]) :route('usersAdd'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group row justify-content-center">
            <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Username') }}</label>
            <div class="col-md-8 align-self-center">
			    {!! Form::text('name',isset($user->name) ? $user->name  : old('name'), ['placeholder'=>'input name', 'class'=>'form-control','id'=>'name','required']) !!}
			 </div>
        </div>
		 
		<div class="form-group row justify-content-center">
            <label for="email" class="col-md-12 col-form-label text-md-center">{{ __('Email') }}</label>
            <div class="col-md-8 align-self-center">
			    {!! Form::text('email',isset($user->email) ? $user->email  : old('email'), ['placeholder'=>'input email', 'class'=>'form-control','id'=>'email','required']) !!}
            </div>
        </div>
		 
		<div class="form-group row justify-content-center">
            <label for="newpassword" class="col-md-12 col-form-label text-md-center"> new password</label>
            <div class="col-md-8">
			    {!! Form::password('password',['class'=>'form-control','id'=>'newpassword']) !!}
			</div>
        </div>
		 
        <div class="form-group row justify-content-center">
            <label for="newpassword_confirmation" class="col-md-12 col-form-label text-md-center"> new password confirmation</label>
            <div class="col-md-8">
			    {!! Form::password('password_confirmation',['class'=>'form-control','id'=>'newpassword_confirmation']) !!}
			 </div>
        </div>
		 
        <div class="form-group row justify-content-center">
            <label for="roles" class="col-md-12 col-form-label text-md-center"> Role</label>
            <div class="col-md-8">
            @php
                dump($user->roles->implode('id', ', '));
                dump($user->roles->toArray());
                dump([$user->roles()->first()->id,3]);
            @endphp
				{!! Form::select('role_id[]', $roles, (isset($user)) ? $user->roles()->first()->id : null, ['multiple','required']) !!}
            </div>
        </div>
		 
		
		@if(isset($user->id))
			<input type="hidden" name="_method" value="PUT">		
		
		@endif

		<div class="form-group row mb-0">
            <div class="col-md-8 offset-md-6">
			    {!! Form::button('Save', ['class' => 'btn btn-the-salmon-dance-3 btn-primary','type'=>'submit']) !!}			
            </div>
        </div>
		 	
{!! Form::close() !!}
</div>
</div>
</div>
</div>

@endsection