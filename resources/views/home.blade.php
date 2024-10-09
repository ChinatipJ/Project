@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <form action="" method="post">
        @csrf
        <label>
            E-mail <input type="text" name="email" required />
        </label><br />
        <label>
            Password <input type="password" name="password" required />
        </label><br />
    </form>
</body>

</html>
@endsection