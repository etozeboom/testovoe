@extends('layouts.admin')

@section('header')

	@include('admin.header')

@endsection

@section('content')
    @php 
        //dump(route('doorsEdit',array('page'=>$data['id'])));
    @endphp
    <div class="wrapper container-fluid">
    {!! Form::open(['url' => route('doorsEdit',array('page'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::hidden('id', $data['id']) !!}
            {!! Form::label('name', 'name:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name', $data['name'], ['class' => 'form-control','placeholder'=>'input name door']) !!}
            </div>
        </div>
            
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>
        
    {!! Form::close() !!}

    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    </div>
    
@endsection