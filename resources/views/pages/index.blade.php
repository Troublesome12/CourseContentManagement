@extends('master')

@section('title', 'Course Content & Management System')

@push('css')
    <link rel="stylesheet" href="{{ URL::to('src/css/owl.css') }}">
    <!-- W3CSS -->
    <link rel="stylesheet" href="{{ URL::to('src/css/w3css.css') }}">
    
    <link rel="stylesheet" href="{{ URL::to('src/css/animate.css') }}"/>
    <!-- stylesheet for effects -->
    <link rel="stylesheet" href="{{ URL::to('src/css/effects.min.css') }}">
@endpush

@section('navbar')
    @include('partials.navbar')
@endsection

@section('preloader')
    @include('partials.preloader')
@endsection

@section('content')
<!-- Section: intro -->
<section id="intro" class="intro">
    <div class="slogan">
        <h2 data-wow-delay="1.5s" class="wow bounceInDown animated">Course Content & Management System</h2>
        <h3 data-wow-delay="1.5s" class="wow slideInLeft animated"><span class="color">  Education  </span>for all</h3>
    </div>
    <div data-wow-delay="1s" class="wow bounceInUp animated page-scroll">
        <div class="wow shake" data-wow-delay="2s">
            <a href="#contact" class="btn btn-circle">
                <i class="fa fa-angle-double-down animated"></i>
            </a>
        </div>
    </div>
</section>
<!-- /Section: intro -->
<!-- Section: Courses list -->
<section id="cse" class="home-section text-center">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow slideInRight" data-wow-delay="0.7s">
                        <div class="section-heading">
                            <h2>Courses List</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.7s">
                        <div class="section-heading">
                            <h3><span class="color">Computer Science and Engineering</span></h3>
                            <i class="fa fa-2x fa-angle-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
            <hr class="marginbot-50">
        </div>
    </div>
    <div class="container grid_container">
        <div class="wow slideInLeft animated" data-wow-delay="0.5s">
            <div class="description text-left">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Total Files</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cseCourses as $course)
                        <tr>
                            <td>{{ $course->course_code }}</td>
                            <td><a href="{{ route('file.index', $course->id) }}">{{ $course->course_name }}</a></td>
                            <td>{{ \App\File::where('course_id', $course->id)->get()->count() }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <div align="center"><a href="{{ route('course.list', ['department' => $course->department]) }}">See More</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
</section>
<section id="eee" class="home-section text-center bg-gray">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.7s">
                        <div class="section-heading">
                            <h3><span class="color">Electrical and Electronic Engineering</span></h3>
                            <i class="fa fa-2x fa-angle-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
            <hr class="marginbot-50">
        </div>
    </div>
    <div class="container grid_container">
        <div class="wow slideInRight animated" data-wow-delay="0.5s">
            <div class="description text-left">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Total Files</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eeeCourses as $course)
                        <tr>
                            <td>{{ $course->course_code }}</td>
                            <td><a href="{{ route('file.index', $course->id) }}">{{ $course->course_name }}</a></td>
                            <td>{{ \App\File::where('course_id', $course->id)->get()->count() }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <div align="center"><a href="{{ route('course.list', ['department' => $course->department]) }}">See More</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
</section>
<section id="bba" class="home-section text-center">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.7s">
                        <div class="section-heading">
                            <h3><span class="color">Bachelor of Business Administration</span></h3>
                            <i class="fa fa-2x fa-angle-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
            <hr class="marginbot-50">
        </div>
    </div>
    <div class="container grid_container">
        <div class="wow slideInLeft animated" data-wow-delay="0.5s">
            <div class="description text-left">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Total Files</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bbaCourses as $course)
                        <tr>
                            <td>{{ $course->course_code }}</td>
                            <td><a href="{{ route('file.index', $course->id) }}">{{ $course->course_name }}</a></td>
                            <td>{{ \App\File::where('course_id', $course->id)->get()->count() }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <div align="center"><a href="{{ route('course.list', ['department' => $course->department]) }}">See More</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
</section>
<!-- /Section: courses list -->
<!-- Section: contact -->
<section id="contact" class="home-section text-center bg-gray">
    <div class="heading-contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>Contact Us</h2>
                            <i class="fa fa-2x fa-angle-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="boxed-grey">
                    <form id="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">
                                        Subject</label>
                                    <select id="subject" name="subject" class="form-control" required="required">
                                        <option value="na" selected="">Choose One:</option>
                                        <option value="service">General Customer Service</option>
                                        <option value="suggestions">Suggestions</option>
                                        <option value="product">Product Support</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                                    Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-contact">
                    <h5>Main Office</h5>
                    <address>
                        <strong>Squas Design, Inc.</strong>
                        <br> Tower 795 Folsom Ave, Beautiful Suite 600
                        <br> San Francisco, CA 94107
                        <br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                    <address>
                        <strong>Email</strong>
                        <br>
                        <a href="mailto:#">email.name@example.com</a>
                    </address>
                    <address>
                        <strong>We're on social networks</strong>
                        <br>
                        <div class="company-social">
                            <a href="#" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook fa-lg"></i></a>
                            <a href="#" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter fa-lg"></i></a>
                            <a href="#" target="_blank" class="btn btn-instagram"><i class="fa fa-instagram fa-lg"></i></a>
                            <a href="#" target="_blank" class="btn btn-google-plus"><i class="fa fa-google-plus fa-lg"></i></a>
                        </div>
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Section: contact -->
@endsection

@push('js')
    <script src="{{ URL::to('src/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::to('src/js/jquery.scrollTo.js') }}"></script>
    <script src="{{ URL::to('src/js/wow.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::to('src/js/custom.js') }}"></script>
@endpush

@section('footer')
    @include('partials.footer')
@endsection