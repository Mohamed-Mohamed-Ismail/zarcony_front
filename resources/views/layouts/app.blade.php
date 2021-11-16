<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Zarcony') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ __('Zarcony') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                @if (isset($_COOKIE['token']))
                    <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">{{ __('My Profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('transactions') }}">{{ __('Transactions’ History') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('doPayment') }}">{{ __('Do Payment') }}</a>
                        </li>
                        <li class="nav-item">
                            <a onclick='logout();' class="nav-link" href="#">{{ __('Logout') }}</a>
                        </li>


                    @else
                        <li class="nav-item dropdown">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        </li>


                    @endif

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<script>


    function logout() {
        const authToken = window.localStorage.getItem("token");
        console.log(authToken)

        axios.post('http://localhost:8000/api/logout', {
            headers: {
                'Authorization': 'Bearer ' + authToken
            }

        }).then(function (result) {
            console.log(result)
            document.cookie = `${'token'}=; Max-Age=-99999999;`;

            window.localStorage.removeItem("token");
            window.location = '/login';
        })
            .catch(function (error) {
                console.log(error);
            });
    }
</script>
</body>
</html>
