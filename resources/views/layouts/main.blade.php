<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <header id="app-cmp-main-header">
        <h1>Project @section('header') @yield('title') @show
        </h1>
    </header>


    <div id="app-cmp-main-content ">
        <div class="linka"><a href="" class="link">1</a>
            <a href="" class="link">2</a>
            <a href="" class="link">3</a>
        </div>
        @yield('content')
    </div>

    <footer id="app-cmp-main-footer">
        Project
    </footer>

</body>

</html>
