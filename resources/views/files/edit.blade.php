@extends('master')

@section('title', 'Edit')

@push('css')
    <link rel="stylesheet" href="{{ URL::to('src/css/parsley.css') }}">
@endpush

@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')
    <div class="container file-container">
    	<div class="col-md-8 col-md-offset-2 title">
            <h1 class="text-center">{{ $file->course->course_name }}</h1>
            <hr>
            <h3 class="text-center">Edit File</h3>
    		<form action="{{ route('file.update', $file->id) }}" method="post" enctype="multipart/form-data" class="title" data-parsley-validate>
    			{{ csrf_field() }}
    			<div class="form-group">
    				<label>Title</label>
    				<input type="text" name="title" class="form-control" value="{{ $file->title }}" data-parsley-required data-parsley-maxlength="255">
    			</div>

    			<div class="form-group">
    				<label>Upload File</label>
    				<input type="file" name="file" class="form-control" value="{{ old('file') }}" accept="image/jpeg, image/png, image/jpg, application/pdf" id="file-input">
                    <span id="file-error" class="text-danger hidden">only pdf, png, jpg & jpeg file types are allowed</span>
                </div>

    			<div class="form-group">
    				<input type="submit" value="Submit" class="form-control btn btn-success">
    			</div>
    		</form>

            <p>* only pdf, png, jpg & jpeg file types are allowed</p>
    	</div>
    </div>
@endsection

@push('js')
    <script src="{{ URL::to('src/js/parsley.min.js') }}"></script>
@endpush