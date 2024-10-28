@extends('layouts.main')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/food-list.css') }}" />
    </head>
    <main>

        <body>
            <div class="container">
                <h1>Add New Food</h1>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('foods.updateNew', ['food' => $food->id,]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="name">Food Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $food->name }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control">{{ $food->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="ingrient">Ingredients:</label>
                        <input type="text" name="ingredient" id="ingredient" class="form-control"
                            value="{{ $food->ingredient }}">
                    </div>
                    <div class="form-group">
                        <label for="time">Stepfood:</label>
                        <textarea name="description" id="description" class="form-control">{{ $food->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="time">Preparation Time:</label>
                        <input type="text" name="time" id="time" class="form-control"
                            value="{{ $food->time }}"> <label for="">นาที</label>
                    </div>
                    <div>
                        {{-- <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach --}}
                        label>Categories
                        <select value="category_id" name="category_id">
                            <option value="{{ $food->category_id }}"> {{ $food->category->name }}</option>
                            @foreach ($categories as $category)
                                @if ($category->id != $food->category->id)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        </label><br />
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="img">Current Image:</label><br>
                        @if ($food->img)
                            <img src="{{ asset('images/' . $food->img) }}" alt="Current Food Image" width="150" class="mb-2">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                    

                    <div class="form-group">
                        <label for="img">Upload New Image:</label>
                        <input type="file" name="img" id="img" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        @endsection
