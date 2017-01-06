@extends('master')

@section('title', 'File List')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="title">
                <h1>File List <span>by {{ Auth::user()->name }}</span></h1>
                <hr>
            </div>
            @foreach ($files as $file)
                <div class="well well-lg">
                    <div class="row">
                        <div class="col-md-8">
                            <h2><a href="{{ route('file.show', $file->id) }}">{{ $file->title }}</a></h2>
                            <i class="icon fa fa-calendar"></i>
                                {{ $file->created_at->diffForHumans() }}
                            <i class="icon"></i>
                            <i class="icon fa fa-comment"></i>
                                {{ $file->comments()->count() }} Comments
                        </div>
                        <div class="col-md-4">
                            <div class="blockquote-reverse">
                                <a href="{{ route('file.edit', $file->id) }}" class="btn btn-primary">Edit</a>
                                <button data-id="{{ $file->id }}" data-token="{{ csrf_token() }}" class="btn btn-danger file-delete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <hr>
            <div class="text-center">
                {!! $files->links() !!}
            </div>
        </div>
    </div>
@endsection