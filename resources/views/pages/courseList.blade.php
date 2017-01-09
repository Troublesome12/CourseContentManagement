@extends('master')

@section('title', 'Course List')

@push('css')
    {{-- <link rel="stylesheet" href="{{ URL::to('src/css/w3css.css') }}"> --}}
@endpush

@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row well-custom">
            <div class="title">
                @if($courses{0}->department == 'cse')
                    <h1>Computer Science & Engineering<span id="item"></span></h1>
                @elseif($courses{0}->department == 'eee')
                    <h1>Electrical & Electronics Engineering<span id="item"></span></h1>
                @else
                    <h1>Bachelor of Business Administration<span id="item"></span></h1>
                @endif
            </div>
            <form class="navbar-form navbar-right search-bar" role="search" method="post" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-info btn-search" name="search">
                    <span class="fa fa-search"></span>
                </button>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Total Files</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->course_code }}</td>
                        <td><a href="{{ route('file.index', $course->id) }}" class="link-item">{{ $course->course_name }}</a></td>
                        <td>{{ \App\File::where('course_id', $course->id)->get()->count() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <hr>
            <div class="text-center">
                {!! $courses->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection