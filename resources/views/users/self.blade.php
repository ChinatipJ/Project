@extends('layouts.main')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}" />
    </head>
    <main>

        <body>
            <div class="container">
                <div class="title">Update profile</div>

                @if (session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.updateSelf', ['user' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <label class="user-details">Name:</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="input-box">
                            <label class="user-details">E-mail:</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="input-box">
                            <label class="user-details">Profile:</label>
                            <textarea name="profile" id="profile" cols="30" rows="10" >{{ $user->profile }}</textarea>
                        </div>

                        <div class="input-box">
                            <label class="user-details">Password:</label>
                            <input type="password" name="password" id="password" placeholder="Leave empty to keep current password">
                            <small class="text-muted">Leave empty if you don't want to change the password</small>
                        </div>
                    </div>
                    <div class="button">
                    <input type="submit" value="Update Profile">
                </div>
            </div>
                </form>
            </div>
        @endsection
