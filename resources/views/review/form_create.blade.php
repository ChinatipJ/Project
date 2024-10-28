@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<!-- Review Form -->
<form action="{{ route('reviews.store',['food_id' => $food->id]) }}" method="post">
    @csrf
    <textarea name="comment" placeholder="Write your review..." required></textarea>
    
    <label for="star">Rating:</label>
    <select name="star" required>
        <option value="" disabled selected>Select a rating</option>
        <option value="1">1 Star</option>
        <option value="2">2 Stars</option>
        <option value="3">3 Stars</option>
        <option value="4">4 Stars</option>
        <option value="5">5 Stars</option>
    </select>

    <button type="submit">Submit Review</button>
</form>


@endsection