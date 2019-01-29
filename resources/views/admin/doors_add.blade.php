@extends('layouts.admin')

@section('header')

	@include('admin.header')

@endsection

@section('content')

	<div class="wrapper container-fluid">

		{!! Form::open(['url' => route('doorsAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
		
		
		<div class="form-group">
			
			{!! Form::label('name','name',['class' => 'col-xs-2 control-label'])   !!}
			<div class="col-xs-8">
				{!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'input name door'])!!}
			</div>
		
		</div>  
			
				<div class="form-group">
				<div class="col-xs-offset-2 col-xs-10">
					{!! Form::button('Save', ['class' => 'btn btn-primary','type'=>'submit']) !!}
				</div>
			</div>
		
		
		
		{!! Form::close() !!}
		
		<script>
			CKEDITOR.replace('editor');
		</script>
		
	</div>

	@endsection