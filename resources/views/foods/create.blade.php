@extends('layouts.main')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}" />
    </head>
    <main>
       

        <body>
            <div class="container">
                <div class="title">Add New Food</div>
                
            
                <form action="{{ route('foods.createAdd') }}" method="POST" enctype="multipart/form-data">
                    @if(session('error'))
                    <div class="error-message">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif


                    

                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="user-details">Food Name:</span>
                            <input type="text" name="name" placeholder="Enter Here" required>
                        </div>

                        <div class="input-box">
                            <span class="user-details">Description:</span>
                            <textarea name="description" placeholder="Enter Here"></textarea>
                        </div>

                        <div class="input-box">
                            <span class="user-details">Ingredients:</span>
                            <input type="text" name="ingredient" placeholder="Enter Here">
                        </div>
                        <div class="input-box">
                            <span class="user-details">Stepfood:</span>
                            <textarea name="stepfood" placeholder="Enter Here"></textarea>
                        </div>

                        <div class="input-box">
                            <span class="user-details">Preparation Time:(นาที)</span>
                            <input type="text" name="time" placeholder="Enter Here">
                        </div>

                        <div class="select-container">
                            {{-- <span class="user-details">Category:</span> --}}
                            <select class="select-box" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="select-container">
                            <span>Image:</span>
                            <input type="file" name="img" placeholder="Enter Here">
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Create">
                    </div>
                </form>
            </div>
        @endsection
