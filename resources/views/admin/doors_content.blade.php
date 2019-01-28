
<div style="margin:0px 50px 0px 50px;">   

@if($doors)
 
	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Дата создания</th>
                
                <th>Удалить</th>
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
	        			{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
	        			
	        		{!! Form::close() !!}
        		</td>
        	</tr>
        
        @endforeach
        
		
        </tbody>
    </table>
@endif 

{!! Html::link(route('doorsAdd'),'new door ') !!}
   
</div>