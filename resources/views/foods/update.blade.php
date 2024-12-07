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

                @if (session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('foods.updateNew', ['food' => $food->id]) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="user-details">
                        <div class="input-box">
                            <span class="user-details">Food Name:</span>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $food->name }}" required>
                        </div>

                        <div class="input-box">
                            <span class="user-details">Description:</span>
                            <textarea name="description" id="description" class="form-control">{{ $food->description }}</textarea>
                        </div>

                        <div class="input-box">
                            <span class="user-details">Ingredients:</span>
                            <input type="text" name="ingredient" id="ingredient" class="form-control"
                                value="{{ $food->ingredient }}">
                        </div>
                        <div class="input-box">
                            <span class="user-details">Stepfood:</span>
                            <textarea name="stepfood" id="stepfood" class="form-control">{{ $food->stepfood }}</textarea>
                        </div>

                        <div class="input-box">
                            <span class="user-details">Preparation Time:(นาที)</span>
                            <input type="text" name="time" id="time" class="form-control"
                                value="{{ $food->time }}">
                        </div>
                        <div>
                            {{-- <span for="category_id">Category</span>
            <select name="category_id" id="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach --}}
                            <div class="select-container">
                                <select class="select-box" value="category_id" name="category_id">
                                    <option value="{{ $food->category_id }}"> {{ $food->category->name }}</option>
                                    @foreach ($categories as $category)
                                        @if ($category->id != $food->category->id)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                </span><br />
                                </select>
                            </div>

                            <div class="imgs">
                                <span>Current Image:</span><br>
                                @if ($food->img)
                                    <img src="{{ asset('images/' . $food->img) }}" alt="Current Food Image" width="150"
                                        class="mb-2">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>



                            <div class="select-container">
                                <span for="img">Upload New Image:</span>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                            <div class="button">
                                <input type="submit" value="Update">
                            </div>
                </form>
            </div>
        @endsection
