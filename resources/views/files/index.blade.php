@extends('master')

@section('title', "$course->course_name")

@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="row title">
                <div class="col-md-10">
                    <h1>{{ $course->course_name }}</h1>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary pull-right top-margin" href="{{ route('file.create', $course->id) }}">Add</a>
                </div>  
            </div>
            <hr>
            
            @foreach ($files as $file)
                <div class="well well-lg">
                    <div class="row">
                        <div class="col-md-8">
                            <h2><a href="{{ route('file.show', $file->id) }}">{{ $file->title }}</a></h2>
                            <i class="icon fa fa-user"></i>
                                {{ $file->user->name }}
                            <i class="icon"></i>
                            <i class="icon fa fa-calendar"></i>
                                {{ $file->created_at->diffForHumans() }}
                            <i class="icon"></i>
                            <i class="icon fa fa-comment"></i>
                                {{ $file->comments()->count() }} Comments
                        </div>
                        <div class="col-md-4">
                            <div class="blockquote-reverse">
                                <a href="{{ route('file.download', $file->id) }}" class="btn btn-skin">Download</a>
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

@section('footer')
    @include('partials.footer')
@endsection