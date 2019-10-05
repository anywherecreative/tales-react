<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('meta.title')</title>
    <meta name="description" content="@yield('meta.description')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}?v=1.2" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @yield('js.top')
    @yield('css.top')
</head>

<body class="@yield('body.class')">
<div id="site-wrap">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-logo visible-phone">t<span>ales</span>C<span>ollective</span>:_</a>
                <a href="{{ route('story.random') }}" class="visible-phone" id="random">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
								<path d="M22.61,17.517l-5.315-0.215c-2.201-0.09-4.47,1.502-5.067,3.555l-1.442,4.958c-0.598,2.054,0.703,3.791,2.904,3.88
										 l5.314,0.215c2.201,0.089,4.471-1.503,5.069-3.558l1.443-4.958C26.11,19.343,24.809,17.606,22.61,17.517z M16.009,26.341
										 c-0.198,0.684-0.955,1.215-1.69,1.188c-0.733-0.031-1.166-0.614-0.966-1.296c0.199-0.684,0.955-1.216,1.688-1.185
										 C15.775,25.077,16.208,25.659,16.009,26.341z M16.821,23.551c-0.199,0.684-0.956,1.216-1.69,1.187
										 c-0.733-0.029-1.166-0.61-0.967-1.294c0.199-0.684,0.955-1.214,1.688-1.184C16.586,22.289,17.02,22.869,16.821,23.551z
										 M17.632,20.764c-0.198,0.684-0.955,1.214-1.69,1.186c-0.732-0.032-1.167-0.611-0.967-1.294c0.199-0.686,0.955-1.216,1.688-1.184
										 C17.397,19.5,17.831,20.08,17.632,20.764z M21.324,26.558c-0.199,0.684-0.955,1.214-1.689,1.185
										 c-0.733-0.03-1.167-0.609-0.968-1.292c0.2-0.686,0.957-1.218,1.689-1.186C21.09,25.292,21.523,25.872,21.324,26.558z M22.135,23.768
										 c-0.199,0.684-0.956,1.217-1.688,1.187c-0.734-0.031-1.168-0.611-0.968-1.296c0.199-0.683,0.955-1.213,1.69-1.185
										 C21.901,22.504,22.334,23.083,22.135,23.768z M22.947,20.979c-0.2,0.685-0.956,1.214-1.689,1.186
										 c-0.734-0.032-1.167-0.612-0.969-1.294c0.199-0.684,0.956-1.216,1.69-1.185C22.712,19.715,23.145,20.295,22.947,20.979z"/>
                        <path d="M10.612,10.884l1.482,3.139c0.614,1.3,2.841,2.454,4.975,2.579l5.149,0.305c2.135,0.125,3.367-0.827,2.753-2.127
										 l-1.482-3.138c-0.613-1.299-2.843-2.455-4.974-2.58l-5.152-0.304C11.228,8.632,9.996,9.583,10.612,10.884z M18.337,11.337
										 c-0.204-0.432,0.206-0.75,0.916-0.709c0.712,0.044,1.454,0.428,1.661,0.862c0.203,0.432-0.207,0.75-0.918,0.709
										 C19.283,12.157,18.542,11.771,18.337,11.337z M15.586,13.463c0.714,0.043,1.453,0.429,1.658,0.861
										 c0.203,0.433-0.206,0.752-0.918,0.709c-0.712-0.043-1.453-0.428-1.658-0.861C14.462,13.739,14.874,13.422,15.586,13.463z"/>
                        <path d="M11.569,14.665l-1.53-3.687C9.403,9.452,8.415,9.847,7.829,11.86l-1.414,4.858c-0.586,2.013-0.547,4.882,0.089,6.409
										 l1.53,3.687c0.636,1.521,1.625,1.131,2.211-0.882l1.414-4.857C12.245,19.059,12.205,16.19,11.569,14.665z M7.947,20.402
										 c-0.196,0.672-0.523,0.803-0.735,0.295c-0.213-0.509-0.227-1.468-0.033-2.138c0.195-0.669,0.528-0.804,0.739-0.291
										 C8.131,18.777,8.142,19.732,7.947,20.402z M8.593,13.702c0.195-0.672,0.527-0.805,0.739-0.294c0.212,0.509,0.223,1.467,0.028,2.136
										 c-0.195,0.669-0.523,0.803-0.735,0.292C8.414,15.328,8.398,14.371,8.593,13.702z M9.48,24.093c-0.194,0.666-0.527,0.801-0.738,0.291
										 c-0.211-0.511-0.225-1.467-0.029-2.139c0.195-0.669,0.523-0.799,0.735-0.29C9.661,22.464,9.676,23.42,9.48,24.093z M10.895,19.232
										 c-0.195,0.669-0.527,0.801-0.739,0.291c-0.213-0.508-0.225-1.465-0.029-2.137c0.194-0.669,0.523-0.801,0.735-0.292
										 C11.075,17.604,11.089,18.563,10.895,19.232z"/>
                        <path d="M38.351,37.534l-0.869-5.22c-0.36-2.164-2.402-4.008-4.562-4.122l-5.208-0.275c-2.16-0.112-3.618,1.551-3.258,3.713
										 l0.869,5.221c0.36,2.164,2.403,4.01,4.56,4.123l5.211,0.274C37.254,41.36,38.71,39.698,38.351,37.534z M31.62,35.89
										 c-0.72-0.037-1.402-0.655-1.521-1.374c-0.119-0.722,0.367-1.273,1.086-1.236c0.721,0.036,1.399,0.651,1.521,1.371
										 C32.826,35.372,32.34,35.927,31.62,35.89z"/>
                        <path d="M37.913,20.262l-5.152-0.305c-2.132-0.126-4.48,0.759-5.244,1.977l-1.841,2.941c-0.765,1.219,0.346,2.309,2.482,2.436
										 l5.147,0.304c2.135,0.126,4.481-0.757,5.245-1.976l1.842-2.941C41.159,21.48,40.046,20.39,37.913,20.262z M30.92,22.898
										 c-0.712-0.042-1.081-0.406-0.828-0.812c0.257-0.406,1.038-0.7,1.751-0.66c0.709,0.042,1.077,0.406,0.824,0.812
										 C32.413,22.644,31.631,22.941,30.92,22.898z M32.574,24.523c-0.712-0.046-1.083-0.409-0.827-0.813
										 c0.252-0.406,1.035-0.702,1.748-0.659c0.709,0.043,1.083,0.406,0.826,0.812C34.069,24.267,33.286,24.563,32.574,24.523z
										 M35.977,25.486c-0.253,0.404-1.035,0.701-1.747,0.658c-0.714-0.04-1.082-0.406-0.829-0.812c0.255-0.405,1.036-0.7,1.749-0.66
										 C35.861,24.717,36.231,25.082,35.977,25.486z"/>
                        <path d="M43.873,28.986l-0.831-4.99c-0.345-2.068-1.28-2.578-2.093-1.137l-1.953,3.481c-0.812,1.439-1.189,4.283-0.846,6.354
										 l0.831,4.99c0.345,2.069,1.28,2.575,2.093,1.136l1.952-3.481C43.84,33.898,44.217,31.056,43.873,28.986z M39.127,30.955
										 c-0.115-0.689,0.014-1.639,0.284-2.12c0.271-0.48,0.583-0.311,0.698,0.378c0.114,0.689-0.012,1.636-0.282,2.117
										 S39.241,31.642,39.127,30.955z M40.658,36.325c-0.271,0.481-0.585,0.308-0.699-0.378c-0.115-0.69,0.014-1.638,0.283-2.118
										 c0.271-0.48,0.583-0.313,0.695,0.374C41.053,34.892,40.929,35.842,40.658,36.325z M41.22,32.088
										 c-0.271,0.479-0.582,0.308-0.695-0.378c-0.115-0.688,0.009-1.638,0.28-2.119c0.271-0.479,0.581-0.309,0.696,0.378
										 C41.615,30.656,41.491,31.606,41.22,32.088z M41.086,27.475c-0.115-0.688,0.01-1.638,0.279-2.118c0.271-0.481,0.585-0.313,0.7,0.378
										 c0.115,0.688-0.014,1.636-0.284,2.115C41.512,28.331,41.2,28.161,41.086,27.475z M42.611,32.845
										 c-0.271,0.477-0.579,0.309-0.694-0.381c-0.115-0.688,0.011-1.635,0.279-2.115c0.271-0.483,0.586-0.313,0.7,0.377
										 C43.011,31.412,42.883,32.362,42.611,32.845z"/>
							</svg>
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar a"></span>
                    <span class="icon-bar b"></span>
                    <span class="icon-bar c"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="mainNav">
                <ul>
                    <li class='hidden-phone {{ Request::is('home') ? 'active' : '' }}'>
                        <a class="navbar-logo" href="/">talesCollective:_</a>
                    </li>
                    <li class="{{ (Route::currentRouteName() == "story.create") ? 'active' : '' }}">
                        <a href="{{ route('story.create') }}" class="new" title="Start a new story">+<span class="sr-only">Start a new Story</span></a>
                    </li>
                    <li class="hidden-phone">
                        <a href="{{ route('story.random') }}">Random Story</a>
                    </li>
                    <li class="{{ (Route::currentRouteName() == "story.top") ? 'active' : '' }}">
                        <a href="{{ route('story.top') }}">Top Rated</a>
                    </li>
                    <li class="{{ Request::is('search*') ? 'active' : '' }}">
                        <a href="{{ route('search') }}">Search</a>
                    </li>
                </ul>
                <div class="user-menu">
                    @if(!Auth::check())
                        <ul>
                            <li><a href="/register">Register</a></li>
                            <li><a href="/login">Login</a></li>
                        </ul>
                    @else
                        <ul>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bell-o"></i>
                                    <span id='notifycount'></span><span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" id="noteBox">

                                </ul>
                            </li>
                            <li class="dropdown right"><a class="hidden-phone">Welcome, {{ auth()->user()->name }}</a>
                                <ul>
                                    <li><a href="/user/profile">Profile</a></li>
                                    <li>
                                        <form method="post" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-link">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container-fluid main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @yield('content')
    </div>
</div>
<footer class="main hidden-print">
    <div class="wrapper">
        <div class="footer-menu">
            <ul>
                <li><a href="/terms">Collective Codex</a></li>
                <li><a href="/questions">Help!</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/tos">Terms of Service</a></li>
                <li><a href="/privacy">Privacy Policy</a></li>
                <li><a href="http://goo.gl/forms/bwcvbr31gh" target="_BLANK">Bug Report </a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- Login Model -->
<div class="modal fade" id="login-box" tabindex="-1" role="dialog" aria-labelledby="login-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="login-label">Login</h4>
            </div>
            <div class="modal-body">
                <p class="message"></p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="login-email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="login-email" type="email" class="form-control" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="login-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="login-password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var server = {{ time() }};
</script>
<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('js.bottom')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-60116885-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
