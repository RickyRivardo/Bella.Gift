<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bella Gift</title>
    

    <link rel="stylesheet" href="/css/style.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      


    <!-- font awesome -->
<link rel=”stylesheet” href="{{ asset('css/all.css')}}" rel=”stylesheet”>

    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:#323232" ></body>
@include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
             <img class="logo" src="{{ url('images/logo.png')}}" width="80" alt="" style="position:absolute;bottom:-15px;right:1250px;" >
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto " style="margin-right:350px;">
                        <!-- Authentication Links -->
                                 <li class="nav-item" >
                                    <a class="nav-link text-light" href="{{ url('/') }}" style="padding-right:50px;">Home</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ url('chat') }}"  style="padding-right:50px;">Chat</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ url('home') }}"  style="padding-right:50px;">Shop</a>
                                </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item " >
                                    <a class="nav-link text-light"  href="{{ route('login') }}" style="position:Relative;right:10px;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}" style="position:Relative;left:15px;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <?php
                                 $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($pesanan_utama))
                                    {
                                     $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                                    }
                                ?>
                                <a class="nav-link text-light" href="{{ url('check-out') }}">
                                  Cart
                                    @if(!empty($notif))
                                    <span class="badge badge-danger">{{ $notif }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item dropdown" style="position:relative;left:350px;" >
                                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ url('storage/users-avatar/avatar.png')}}" class="card-img-top"  style="width:30px;height:30px;border-radius:30px;" alt="...">
                                </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        Profile
                                    </a>
                                    
                                 

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
