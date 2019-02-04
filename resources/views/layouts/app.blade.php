<!DOCTYPE html class="h-100">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>
<body class="h-100">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div id="app" class="h-100">
        <b-navbar toggleable="md" type="dark" variant="primary">
            <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

            <b-navbar-brand href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>

            <b-collapse is-nav id="nav_collapse">
               
                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    @guest
                        <b-nav-item href="{{ route('login') }}">Ingresar</b-nav-item>
                        @if (Route::has('register'))
                            <b-nav-item href="{{ route('register') }}">Registrarse</b-nav-item>
                        @endif
                    @else
                        <b-nav-item-dropdown right>
                            <!-- Using button-content slot -->
                            <template slot="button-content">
                                <em>{{ Auth::user()->name }}</em>
                            </template>
                            <b-dropdown-item href="#">Perfil</b-dropdown-item>
                            <b-dropdown-item href="#" @click="logout">Cerrar session</b-dropdown-item>
                        </b-nav-item-dropdown>
                    @endguest
                    
                </b-navbar-nav>

            </b-collapse>
        </b-navbar>
        
        <main class="py-4" >
            @yield('content')
        </main>
    </div>
</body>
</html>
