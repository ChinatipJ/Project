<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Controller @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <header id="app-cmp-main-header">
        <h1>My Controller @section('header') @yield('title') @show
        </h1>
    </header>


    <div id="app-cmp-main-content ">
        <div class="linka"><a href="{{ route('products.list') }}" class="link">Products</a>
            <a href="{{ route('categories.list') }}" class="link">Categories</a>
            <a href="{{ route('shops.list') }}" class="link">Shop</a>
            @session('status')
                <div class="app-cmp-notification">
                    <span class="app-cl-info">{{ $value }}</span>
                </div>
            @endsession
        </div>
        @yield('content')
    </div>

    <footer id="app-cmp-main-footer">
        Week-06: Controller, Bandit
    </footer>

</body>

</html>
