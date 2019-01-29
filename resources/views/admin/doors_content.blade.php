
<div class='container' >   

@if($doors)
 
	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Date create</th>
                
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($doors as $k => $door)
        
        	<tr>
        	
        		<td>{{ $door->id }}</td>
        		<td>{!! Html::link(route('doorsEdit',['door'=>$door->id]),$door->name,['alt'=>$door->name]) !!}</td>
        		<td>{{ $door->created_at }}</td>
        		
        		<td>
	        		{!! Form::open(['url'=>route('doorsEdit',['door'=>$door->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

	        			{{ method_field('DELETE') }}
	        			{!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
	        			
	        		{!! Form::close() !!}
        		</td>
        	</tr>
        
        @endforeach
        
		
        </tbody>
    </table>
@endif 

{!! Html::link(route('doorsAdd'),'new door ') !!}
   
</div>