@extends('layouts.main')

@section('content')
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
    
<main>

    <body>
        <div class="container">
            <div class="title">Review</div>

            <form action="{{ route('reviews.store', ['food_id' => $food->id]) }}" method="post">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="user-details">Rating:</span>
                        <textarea name="comment" placeholder="Write your review..." required></textarea>
                    </div>
                    <div class="select-container">
                        <select name="star" required>
                            <option value="" disabled selected>Select a rating</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>
                    <div class="button">
                        <input type="submit" value="Submit Review">
                    </div>
                </div>
            </form>
        </div>
    </body>
</main>
</html>
@endsection
