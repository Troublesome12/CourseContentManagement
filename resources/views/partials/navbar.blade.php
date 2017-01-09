<nav class="navbar navbar-custom navbar-fixed-top {{ ( Request::is('/') || Request::is('/login') ) ? '' : 'top-nav-collapse' }}" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#intro">
                <h1>CCMS</h1>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse page-scroll">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('index') }}/#intro">Home</a></li>
                @if(Request::is('/'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#cse">Computer Science and Engineering</a></li>
                            <li><a href="#eee">Electrical and Electronic Engineering</a></li>
                            <li><a href="#bba">Bachelor of Business Administration</a></li>
                        </ul>
                    </li> 
                    <li><a href="#contact">Contact Us</a></li>
                @endif
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('file.list') }}">Files</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Log out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ Route('login') }}">Log In</a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>