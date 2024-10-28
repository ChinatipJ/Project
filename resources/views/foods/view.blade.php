@extends('layouts.main')

@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/food-view.css') }}" />
</head>

<main>
    <div class="row">
        <div class="imgwrap">
            <img src="{{ asset('images/' . $food->img) }}" alt="{{ $food->name }}">
        </div>
        <div class="contentwrap">
            <div class="text-content">
                <h2>{{ $food->name }}</h2>
                <h3>รายละเอียด</h3>
                <div class="scrollbox">
                    <div class="scrollbox-inner">
                        <span class="dis">{{ $food->description }}</span>
                        <div><h4>ส่วนประกอบ</h4></div>  
                        <div>{!! nl2br(e($food->ingredient)) !!}</div>
                        <div><h4>ขั้นตอนการทำ</h4></div>  
                        <div>{!! nl2br(e($food->stepfood)) !!}</div>
                        <div><h4>เวลาที่ใช้ในการปรุงอาหาร</h4></div>  
                        <div class="dis">{{ $food->time }}</div>
                        <div><h4>ผู้เขียนบทความ</h4></div>  
                        <div class="dis">{{ $food->user->name }}</div>
                        <div><h3>Rate Reviews {{ $averageRating }}</h3></div>
                        <a href="{{ route('reviews.create', ['food_id' => $food->id]) }}">Write a Review</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="reviews">
    @foreach($reviews as $review)
        <div class="comment-content">
            <div class="commentbig-container">
                <div class="comment-container">
                    <div class="comment-card">
                        <h3 class="title">{{ $review->user_name ?? 'Anonymous' }}</h3>
                        <p>{{ $review->comment }}</p>
                        <p>Rating: {{ $review->star }} Stars</p>
                        <div class="comment-footer">
                            @if ($review->user_id === Auth::id())
                                <div class="review-edit-button">
                                    <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>
                                </div>
                                {{-- <form action="{{ route('reviews.destroy', $review->id) }}" method="post" style="display:inline;"> --}}
                                    @csrf
                                    @method('DELETE')
                                    <div class="review-delete-button">
                                        <a href="{{ route('reviews.destroy', $review->id) }}">Delete</a>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


</main>

@endsection
