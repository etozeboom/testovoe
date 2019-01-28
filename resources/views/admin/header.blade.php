@extends('layouts.app')

@section('content')
<div class="container "> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>{{$title}}</h2>
    </div>
    <!--/Title --> 
    

  <!-- Container -->
  
    <div class="admin">

        <div  class="menu columns">
            <a class='btn'  href="{{route('door')}}"><h5>Doors</h5></a>
            <a class='btn'  href="{{route('permission')}}"><h5>permissions</h5></a>
            <a class='btn'  href="{{route('user')}}"><h5>users</h5></a>
        </div>

    </div>	
</div>
@endsection