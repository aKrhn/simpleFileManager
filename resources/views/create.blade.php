@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)
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

<form method="post" action="{{ route('crud.store') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
	<label class="col-md-4 text-right">
		File Name
	</label>
		<div class="col-md-8">
			<input type="text" name="file_name" class="form-control input-lg" />
		</div>
	</div>
	<br><br><br>
	<div class="form-group">
	<label class="col-md-4 text-right">
		Description
	</label>
		<div class="col-md-8">
			<input type="text" name="description" class="form-control input-lg" />
		</div>
	</div>
	<br><br><br>
	<div class="form-group">
	<label class="col-md-4 text-right">
		Select File
	</label>
		<div class="col-md-8">
	 		<input type="file" name="file" />
		</div>
	</div>
 <br/><br/><br/>
	<div class="form-group text-center">
		<input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
	</div>
</form>
@endsection