@extends('layouts.admin')

@section('header')

	@include('admin.header')

@endsection

@section('content')

<div id="content-page" class="content group container">
    <div class="hentry group">
    <h3 class="title_page">Users</h3>


    <div class="short-table white">
        <table style="width: 100%" cellspacing="0" cellpadding="0" class='table table-hover table-striped'>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Delete</th>
        </thead>
        @if($users)
            
            
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{!! Html::link(route('usersEdit',['users' => $user->id]),$user->name) !!}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->implode('name', ', ') }}</td>


                <td>
                {!! Form::open(['url' => route('usersEdit',['users'=> $user->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                                        {{ method_field('DELETE') }}
                                                        {!! Form::button('Delete', ['class' => 'btn btn-french-5 btn-danger','type'=>'submit']) !!}
                                                    {!! Form::close() !!}

                </td>
            </tr>										
            @endforeach
            
        @endif
        </table>
        </div>
        {!! Html::link(route('usersAdd'),'add user',['class' => 'btn btn-the-salmon-dance-3']) !!}
        
    </div>
</div>

@endsection