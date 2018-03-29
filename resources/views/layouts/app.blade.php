<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- CUSTOM CSS -->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{ route('level.index') }}">All levels</a></li>
                        <!-- USER MENU -->
                            @if( Auth::check())
                                <li><a class="nav-link" href="{{ route('userLevels') }}">Your levels</a></li>
                                <li><a class="nav-link" href="{{ route('level.create')}}">Create level</a></li>
                            @endif
                        <!-- END USER MENU -->
                        <li><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

    <footer class="bg-warning">
        <div class="container py-3 ">
            <!-- FOOTER INFO -->
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="sectionHeader">About</h4>
                        <p>Bacon ipsum dolor amet pancetta sausage picanha flank prosciutto. Hamburger filet mignon pork loin ribeye landjaeger turkey corned beef doner. Chuck corned beef pastrami, swine burgdoggen flank ground round spare ribs ham sausage. </p>
                    </div>
                    <div class="col-md-4">
                        <h4 class="sectionHeader">Contact</h4>
                        <p><a href="http://www.katkus.eu" target="_blank">Laimonas Katkus</a></p>
                        <p><a href="mailto:laimonas@katkus.eu">laimonas@katkus.eu</a></p>
                    </div>
                </div>
            <!-- END FOOTER INFO -->

            <!-- COPYRIGHTS -->
                <div class="row">
                    <div class="col-12 text-center">
                        Copyright 2018, <a href="http://www.katkus.eu" target="_blank">Laimonas Katkus</a>, All rights reserved.
                    </div>
                </div>
            <!-- END COPYRIGHTS -->
        </div>
    </footer>

</body>
</html>
