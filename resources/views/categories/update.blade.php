@extends('layouts.main')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}" />
    </head>
    <main>

        <body>
            <div class="container">
                <div class="title">Update gategory</div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('categories.updateNew', ['category' => $category->id,]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="user-details">
                        <div class="input-box">
                        <label class="user-details">Category Name:</label>
                        <input type="text" name="name" id="name" value="{{ $category->name }}" required>
                        </div>
                    </div>

                    <div class="button">
                        <input type="submit" value="Update">
                    </div>
                </form>
            </div>
        </body>
@endsection
