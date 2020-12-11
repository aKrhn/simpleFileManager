@extends('parent')
@section('main')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('crud.index') }}" class="btn btn-default">
			Back
		</a>
	</div>
	<br>
	<a href="{{ URL::to('/') }}/files/{{$data->file}}" class="file-thumbnail"/>
		{{ $data->file }}
	</a> 
	<h3>File Name - {{ $data->file_name }}</h3>
	<h3>Description - {{ $data->description }}</h3>
</div>
@endsection