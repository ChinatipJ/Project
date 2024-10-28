<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" />

</head>

<body>
    <div class="title">
        <h1>DISH DEELIGHT</h1>
    </div>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <div class="formBox">
                <form method="POST" action="{{ route('register_submit') }}">
                    @csrf 
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
            
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
            
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
            
                    <div class="form-group">
                        <label for="profile">Profile:</label>
                        <input type="text" class="form-control" id="profile" name="profile">
                    </div>
            
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>

    </div>
    </form>
</body>

</html>
