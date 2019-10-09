<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="/css/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/css/fonts/ionicons.min.css">
    <link rel="stylesheet" href="/css/css/Footer-Basic.css">
    <link rel="stylesheet" href="/css/css/Header-Blue.css">
    <link rel="stylesheet" href="/css/css/styles.css">
</head>

<header>
    <div>
        <nav class="navbar navbar-light navbar-expand-md  text-light" id="navbar">
            <div class="container"><img id="logo" src="/img/logo.png"><a class="navbar-brand" id="navbarTxt" href='/'>BitLibrary</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation"><a class="nav-link" id="navbarTxt" href='/posts'>Blog</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" id="navbarTxt" href='/library'>Library</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" id="navbarTxt" href='pages/about'>About</a></li>
                    </ul>
                    <ul class="nav navbar-nav" style="margin-left: auto;">
                        @guest
                            <li class="nav-item" role="presentation"><a class="nav-link bg-secondary border rounded" id="icon" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link bg-secondary border rounded" id="icon" href="{{ route('register')}}">{{ __('Register') }}</a></li>
                            <li class="nav-item" role="presentation"></li>
                        @else
                        <div class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        </li>
                        @endguest
                    </ul>
            </div>
    </div>
    </nav>
    <nav class="navbar navbar-light navbar-expand-md fixed-top" id="header">
        <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><i class="icon ion-email" id="icon"></i>
            <h6 id="headerText">adriano199726@gmail.com</h6>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="nav navbar-nav"></ul>
            </div><i class="fa fa-twitter" id="icon"></i><i class="fa fa-linkedin" id="icon"></i><i class="fa fa-github" id="icon"></i></div>
    </nav>
    </div>
    <div></div>
    <script src="/js/bootstrapJs/jquery.min.js"></script>
    <script src="/js/bootstrapJs/bootstrap.min.js"></script>
</header>















{{-- Old Navbar --}}

{{--
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Bitlibrary') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/pages/services">Services</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/posts">Blog</a>
                    </li>
                    <li class="nav-item active">
                            <a class="nav-link" href="/library">Library</a>
                        </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/pages/about">About</a>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                    @guest
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/posts/create"> Create Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                         @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
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
    </nav> --}}
