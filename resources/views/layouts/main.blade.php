<!DOCTYPE html>

<head>
    <title>Project @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>

{{--    
    <div class="icon-section">
        <form action="{{ route('foods.search') }}" method="get">
            <i class="fas fa-search search-icon"></i>
            <input type="text" name="term" value="{{ request('term', '') }}" placeholder="Search foods..." class="search-input"/> 
        </form>
    </div>
--}}
<div class="main-container">
    <div class="side-nav">
        <div class="user">
            <img src="{{ Avatar::create(Auth::check() ? Auth::user()->name : 'view')->toBase64() }}" class="user-img" />
            <div>
                <h2>{{ Auth::check() ? Auth::user()->name : 'viewer' }}</h2>
<p>{{ Auth::check() ? Auth::user()->email : '' }}</p>
            </div>
        </div>

        <ul>
            <li><img src="{{ asset('img/homes.png') }}"><p><a href="{{ route('home.form') }}">Home</a></p></li>
            <li><img src="{{ asset('img/about.png') }}"><p><a href="{{ route('home.about') }}">About Us</a></p></li>
            <li><img src="{{ asset('img/list.png') }}"><p><a href="{{ route('foods.list') }}">List</a></p></li>
            <li><img src="{{ asset('img/list.png') }}"><p><a href="{{ route('foods.control') }}">Food Control</a></p></li>
                @can('Create', \App\Models\Category::class)
            <li><img src="{{ asset('img/list.png') }}"><p><a href="{{ route('categories.control') }}">Category Control</a></p></li>   
                @endcan
            <li>
                <img src="{{ asset('img/category.png') }}"><p>Categories</p>
            @foreach($categories as $category)
                <li><p><a href="{{ route('categories.list', $category->id) }}">- {{ $category->name }}</a></p></li>
            @endforeach
            </li>

            <a href="{{route('logout')}}"><li><p>Logout</p></li></a>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>
    
</div>

<footer>
    <div class="footer-container">
        <div class="footer-row">
            <div class="col">
                <a href="" class="footer-logo">DISHDELIGHT</a>
                <p>" เราเชื่อว่าการทำอาหารควรเป็นเรื่องสนุกและเต็มไปด้วยความสุข เว็บไซต์ของเรารวบรวมสูตรอาหารหลากหลาย ทั้งเมนูคาว หวาน และเพื่อสุขภาพ ให้คุณได้ลองสร้างสรรค์มื้ออร่อยที่บ้านได้ง่ายๆ ทุกวัน มาร่วมเพลิดเพลินกับการทำอาหารที่ไม่ยุ่งยากไปกับเรา !! " </p>
                <ul class="social">
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
            </div>
    </div>
</footer>

</body>

</html>
