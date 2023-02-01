<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

            
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        

                            @guest
                                @if (Route::has('admin.login'))
                                
                                        <a class="nav-link" href="{{  url('admin/login')  }}">{{ __('ログイン') }}</a>
                                    
                                @endif
                        

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('admin/register') }}">{{ __('ユーザ登録') }}</a>
                                    </li>
                                @endif
                            @else

                            <ul class="navbar-nav ml-auto mr-5">

                            <li class="nav-item ml-2">
                            <a class="nav-link text-black" id="post-link" href="{{ url('admin/home') }}">トップ</a>
                            </li>
                            
                            <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-black" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            メニュー
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('AdminMypage') }}">管理者メニュー</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('room.index') }}">会議室予約</a>
                                <a class="dropdown-item" href="{{ route('contact') }}">問合せ</a>
                                <div class="dropdown-divider"></div>
                               
                           

                                
                          


                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                        
                            <li class="nav-item">
                                <p id="navbar" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </p>


     

                                    
                                </div>

                            </li>
                            @endguest
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
