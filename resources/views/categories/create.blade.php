@extends('layouts.main')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}" />
    </head>
    <main>

        <body>
            <div class="container">
                <div class="title">Create Category</div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('categories.createNew') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="user-details">
                        <div class="input-box">
                            <span class="user-details">Category Name:</span>
                            <input type="text" name="name" id="name" placeholder="Enter Category Name" required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Create">
                    </div>
                </form>
            </div>
        @endsection
