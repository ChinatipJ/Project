<!DOCTYPE html>

<head>
    <title>Project @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="navbar">
        <div class="logo"><a href="">DISH DELIGHT</a></div>
        <a href=""><i class="fa fa-fw fa-user"></i> Login</a>
        <a href="{{ route('foods.list') }}"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <a href="{{ route('foods.view') }}"><i class="fa fa-fw fa-search"></i> Search</a>
        <a href="{{ route('home.form') }}"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>

    <div>
        @yield('content')
    </div>

    <footer>
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
    </footer>
</body>

</html>
