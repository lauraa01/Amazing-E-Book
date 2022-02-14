<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
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

                <ul class="navbar-nav ml-auto" style="background-color: #fdde4a">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                            </li>
                        @endif

                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            <div class="opening">
                <h3 class="opening-text">Log Out Success!</h3>
            </div>

        </main>
    </div>

    <footer>
        <h6>© Amazing E-Book 2022</h6>
    </footer>
</body>
</html>
