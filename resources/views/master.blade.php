<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
        <title>@yield('title')</title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{ URL::to('src/css/bootstrap.min.css') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ URL::to('src/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('src/css/sweetalert.css') }}">
        <!-- Squad theme CSS -->
        <link rel="stylesheet" href="{{ URL::to('src/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::to('src/css/default.css') }}">
        <link rel="stylesheet" href="{{ URL::to('src/css/sweetalert.css') }}">
        @stack('css')
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">

        <!-- preloader -->
        @yield('preloader')
        
        <!-- header -->
        @yield('navbar')
        
        <!-- main content -->
        @yield('content')
        
        <!-- Core JavaScript Files -->
        <script src="{{ URL::to('src/js/jquery.min.js') }}"></script>
        <script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::to('src/js/sweetalert.min.js') }}"></script>
        <script src="{{ URL::to('src/js/main.js') }}"></script>
        <script>
            @if ( notify()->ready() )
                swal({
                    title: "{!! notify()->message() !!}",
                    type: "{{ notify()->type() }}",
                    @if ( notify()->option('timer') )
                        timer: "{{ notify()->option('timer') }}",
                        showConfirmButton: false,
                    @endif
                    html: true
                });
            @endif
        </script>

        @stack('js')

        <!-- footer -->
        @yield('footer')
    </body>
</html>