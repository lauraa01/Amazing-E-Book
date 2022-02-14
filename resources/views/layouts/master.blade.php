<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <h2 class="web-title">Amazing E-Book</h2>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="{{ route('logout') }}" class="menu" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </form>
            </div>
        </nav>

        {{-- @if(Auth::check()) --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid d-flex justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item mx-3 {{ request()->routeIs('home')? 'active': '' }}">
                        <a href="{{ route('home')}}" class="badge btn-warning">{{__('navbar.home')}}</a>
                    </li>
                    <li class="nav-item mx-3 {{ request()->routeIs('cart')? 'active': '' }}">
                        <a href="{{ route('cart')}}" class="badge btn-warning">{{__('navbar.cart')}}</a>
                    </li>
                    <li class="nav-item mx-3 {{ request()->routeIs('profile')? 'active': '' }}">
                        <a href="{{ route('profile')}}" class="badge btn-warning">{{__('navbar.profile')}}</a>
                    </li>
                    @if (Auth::user()->role_id == 2)
                        <li class="nav-item mx-3 {{ request()->routeIs('maintenance')? 'active': '' }}">
                            <a href="{{ route('maintenance')}}" class="badge btn-warning">{{__('navbar.account maintenance')}}</a>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid d-flex justify-content-center">
                <ul class="navbar-nav">
                    <li><a class="nav-item mx-3" href="lang/id">ID</a></li>
                    <li><a class="nav-item mx-3" href="lang/en">EN</a></li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer>
        <h6>© Amazing E-Book 2022</h6>
    </footer>
</body>
</html>
