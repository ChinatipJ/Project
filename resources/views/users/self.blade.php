@extends('layouts.main')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/food-list.css') }}" />
    </head>
    <main>

        <body>
            <div class="container">
                <h1>create Category</h1>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <form action="{{ route('users.updateSelf',['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name }}" required>
                        </div>
                        
                        <div>
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email }}" required>
                        </div>
                        
                        <div>
                            <label for="profile">Profile:</label>
                            <textarea name="profile" id="profile" cols="30" rows="10" class="form-control">{{ $user->profile }}</textarea>
                        </div>
                        
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Leave empty to keep current password">
                            <small class="text-muted">Leave empty if you don't want to change the password</small>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        @endsection
