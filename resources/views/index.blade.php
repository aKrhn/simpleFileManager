@extends('parent')
@section('main')

<div align="right">
	<a href="{{ route('crud.create') }}" class="btn btn-success btn-sm">
		Add
	</a>
</div>

@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
@endif
<table class="table table-bordered table-striped">
	<tr>
		<th width="10%">File</th>
		<th width="35%">Name</th>
		<th width="35%">Description</th>
		<th width="30%">Action</th>
	</tr>
@foreach($data as $row)
	<tr>
		<td>
			<a href="{{ URL::to('/') }}/files/{{ $row->file }}">
				{{ $row->file }}
			<a/>
		</td>
		<td>{{ $row->file_name }}</td>
		<td>{{ $row->description }}</td>
		<td>
	 		<form action="{{ route('crud.destroy', $row->id) }}" method="post">
		 		<a href="{{ route('crud.show', $row->id) }}" class="btn btn-primary">
		 			Show
		 		</a>
		 		<a href="{{ route('crud.edit', $row->id) }}" class="btn btn-warning">
		 			Edit
		 		</a>
					{{ csrf_field() }} {{ method_field('DELETE') }}
				<button type="submit" class="btn btn-danger">
					Delete
				</button>
			</form>
		</td>
	</tr>
@endforeach
</table>
	{!! $data->links() !!}
@endsection