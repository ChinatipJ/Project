<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />
 
</head>

<body>   
    <div class="title"><h1>DISH DEELIGHT</h1></div>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <div class="formBox">
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <p>
                        E-mail <input type="text" name="email" placeholder="E-mail" required />
                    </p>
                    <p>
                        Password <input type="password" name="password" placeholder="password" required />
                    </p>
                    <button type="submit">Login</button>
                    @error('credentials')
                        <div class="warn">{{ $message }}</div>
                    @enderror
                    <div><a href="{{ route('register')}}">Register</a></div>
            </div>
            
        </div>

    </div>
    </form>
</body>

</html>