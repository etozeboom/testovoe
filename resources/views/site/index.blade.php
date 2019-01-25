@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doors</div>
                <div class="doors">
                    @foreach($doors as $door)
                    <a id="{{ $door->id}}" href="#" class="door btn">{{ $door->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
