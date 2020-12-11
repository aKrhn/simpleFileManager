@extends('parent')
@section('main')
						
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif
<div align="right">
	<a href="{{ route('crud.index') }}" class="btn btn-default">
		Back
	</a>
</div>
<br>
<form method="post" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}
<div class="form-group">
	<label class="col-md-4 text-right">
		File Name
	</label>
	<div class="col-md-8">
	<input type="text" name="file_name" value="{{ $data->file_name }}" class="form-control input-lg" />
	</div>
</div>
<br><br><br>
<div class="form-group">
	<label class="col-md-4 text-right">
		Description
	</label>
	<div class="col-md-8">
	<input type="text" name="description" value="{{ $data->description }}" class="form-control input-lg" />
	</div>
</div>
<br><br><br>
<div class="form-group">
	<label class="col-md-4 text-right">Select Profile Image</label>
	<div class="col-md-8">
		<input type="file" name="file" />
			<img src="{{ URL::to('/') }}/files/{{ $data->file }}" class="img-thumbnail" width="100" />
		<input type="hidden" name="updated_file" value="{{ $data->file }}" />
	</div>
</div>
<br><br><br>
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
	</div>
</form>

@endsection