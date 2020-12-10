@extends('parent')
@section('main')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('crud.index') }}" class="btn btn-default">
			Back
		</a>
	</div>
	<br>
	<button class="btn btn-primary">
	<a href="{{ URL::to('/') }}/images/{{$data->file}}" class="file-thumbnail"/></a> 
	</button>
	<h3>File Name - {{ $data->file_name }}</h3>
	<h3>Description - {{ $data->description }}</h3>
</div>
@endsection