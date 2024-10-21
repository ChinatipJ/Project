<!DOCTYPE html>

<head>
    <title>Project @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="sidebar" id="sidebar">
        
        <div class="icon-section">
            <i class="fas fa-user user-icon"></i>
            <span class="username">{{ \Auth::user()->name }}</span> 
        </div>

        
        <div class="icon-section">
            <form action="{{ route('foods.search') }}" method="get">
            <i class="fas fa-search search-icon"></i>
            <input type="text" name="term" value="{{ request('term', '') }}" placeholder="Search foods..." class="search-input"/> 
        </form>
        </div>

     
        <div class="icon-section">
            <i class="fas fa-th-list category-icon"></i>
            <span class="category-title">Categories</span>
        </div>

        <ul class="category-list">
            @foreach($categories as $category)
            <li> <a href="{{ route('categories.list', $category->id) }}">- {{ $category->name }}</a></li>
        @endforeach
        </ul>
        <a href="{{route('logout')}}">
        <div class="logout-section">
          
            <i class="fas fa-sign-out-alt logout-icon"></i>
            <span class="logout-text">Logout</span>
       
        </div>
    </a>
    </div>
    <div class="navbar">
        <div class="logo"><a href="">DISH DELIGHT</a></div>
        <a href="{{route('logout')}}"><i class="fa fa-fw fa-user"></i> Logout</a>
        <a href="{{ route('foods.create') }}"><i class="fa fa-fw fa-envelope"></i> Create</a>
        <a href="{{ route('foods.list') }}"><i class="fa fa-fw fa-envelope"></i> List</a>
        {{-- <a href="{{ route('foods.view') }}"><i class="fa fa-fw fa-search"></i> View</a> --}}
        <a href="{{ route('home.form') }}"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    {{-- <footer>
        <div class="footer-container">
            <div class="footer-row">
                <div class="col">
                    <a href="" class="footer-logo">Logo</a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa amet autem odio velit illum tempore 
                    vitae consequatur veritatis nam ab quae voluptatibus.</p>
                    <ul class="social">
                        <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <div class="col">
                    <h4>Some Link</h4>
                    <ul>
                        <li><a href="">Link 1</a></li>
                        <li><a href="">Link 2</a></li>
                        <li><a href="">Link 3</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h4>Some Link</h4>
                    <ul>
                        <li><a href="">Link 1</a></li>
                        <li><a href="">Link 2</a></li>
                        <li><a href="">Link 3</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h4>Some Link</h4>
                    <ul>
                        <li><a href="">Link 1</a></li>
                        <li><a href="">Link 2</a></li>
                        <li><a href="">Link 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> --}}
</body>

</html>
