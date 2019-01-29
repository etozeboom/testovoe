@extends('layouts.admin')

@section('header')

	@include('admin.header')

@endsection

@section('content')

<div id="content-page" class="content group">
	<div class="hentry group">
	
	<h3 class="title_page">permissions</h3>
	
	<form action="{{ route('permissions') }}" method="POST">
		{{ csrf_field() }}
		
		<div class="short-table white">
		
			<table style="width:100%">
				
				<thead>
					
					<th>permissions</th>
					@if(!$roles->isEmpty())
					
						@foreach($roles as $item)
							<th>{{ $item->name}}</th>
						@endforeach
					
					@endif
					
				</thead>
				<tbody>
					
					@if(!$doors->isEmpty())
					
						@foreach($doors as $door)
							<tr>
								
								<td>{{ $door->name }}</td>
									@foreach($roles as $role)
										<td>
											@if($role->hasPermission($door->name))
												<input checked name="{{ $role->id }}[]"  type="checkbox" value="{{ $door->id }}">
											@else
												<input name=" {{ $role->id }}[]"  type="checkbox" value="{{ $door->id }}">
											@endif	
										</td>
									@endforeach
							</tr>
						@endforeach
					
					@endif

				</tbody>
				
				
			</table>
			
			
		</div>
		
		<input class="btn btn-the-salmon-dance-3" type="submit" value="Update" />

		
	</form>

	
	</div>
</div>

@endsection