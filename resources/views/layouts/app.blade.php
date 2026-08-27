<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'StyleHub' }} | StyleHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="nav">
        <a class="brand" href="{{ route('home') }}"><span>SH</span> StyleHub</a>
        <div class="nav-links">
            <a href="{{ route('products.index') }}">Shop</a>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                @if (auth()->user()->isAdmin()) <a href="{{ route('products.create') }}">Add product</a> @endif
                <form method="POST" action="{{ route('logout') }}"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="link-button" type="submit">Log out</button></form>
            @else
                <a href="{{ route('login') }}">Log in</a><a class="button button-small" href="{{ route('register') }}">Join StyleHub</a>
            @endauth
        </div>
    </nav>
    <main class="page">
        @if (session('status')) <div class="alert">{{ session('status') }}</div> @endif
        @if ($errors->any()) <div class="alert alert-error"><strong>Please check the form.</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
        @yield('content')
    </main>
    <footer>StyleHub <span>Curated everyday pieces for your next chapter.</span></footer>
</body>
</html>
