@extends('layouts.main')

@section('content')
 <link rel="stylesheet" href="{{ asset('css/form.css') }}">
<h2>Edit Review</h2>

<form action="{{ route('reviews.update', $review->id) }}" method="post">
    @csrf
    @method('PUT') <!-- ใช้สำหรับ PUT Method -->
    
    <textarea name="comment" placeholder="Write your review...">{{ $review->comment }}</textarea>
    <select name="star">
        <option value="1" {{ $review->star == 1 ? 'selected' : '' }}>1 Star</option>
        <option value="2" {{ $review->star == 2 ? 'selected' : '' }}>2 Stars</option>
        <option value="3" {{ $review->star == 3 ? 'selected' : '' }}>3 Stars</option>
        <option value="4" {{ $review->star == 4 ? 'selected' : '' }}>4 Stars</option>
        <option value="5" {{ $review->star == 5 ? 'selected' : '' }}>5 Stars</option>
    </select>
    <input type="hidden" name="food_id" value="{{ $review->food_id }}">
    <button type="submit">Update Review</button>
</form>
@endsection
