<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Showroom</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/fullpage.min.css" />


    <style>
        
    #site-title{
        font-family: "Snell Roundhand, cursive";
        font-size: 25px; 
    }

    .header-links {
        font-size: 14px;
        text-transform: uppercase;
    }


    </style>


</head>
<body>
<div id="app">
    <div class=”main-container”>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a href="/explore" class="nav-link header-links">Explore</a>
                    </ul>


                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/imgs/paint.png" alt="Showroom" class="showroom-icon">
                     <span id="site-title">Showroom</span>
                    </a>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto " style="padding-right:20px;">
                            @auth
                            <a href="/create_painting" class="btn btn-primary new_painting">Upload</a>
                            @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link header-links " href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link header-links" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle header-links" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="/profile/{{ Auth::user()->id }}" class="dropdown-item header-links">My Profile</a>
                                <a href="/galleries" class="dropdown-item header-links">My Galleries</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

</body>
</html>
