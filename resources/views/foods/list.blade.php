@extends('layouts.main')

@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/food-list.css') }}" />
</head>

<main>
<body>
    @csrf
    <form action="" method="post">
<div class="container">
    <div class="title-wrapper">
        <div class="title">
            <h2>Food</h2>
            <h2>Food</h2>
        </div>
    </div>

    @error('error')
    <div>
        <span>{{ $message }}</span>
    </div>
    @enderror
    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

    <div class="create-button">
        <a href="{{ route('foods.create') }}">CREATE</a>
    </div>
    
        <div class="data-container">
            @foreach ($foods as $food)
                 <a class="linkfoods" href="{{ route('foods.view', $food->id) }}">
                    <div class="card">
                        <div class="imgwrap">
                            <img src="{{ asset('images/' . $food->img) }}" alt="">
                        </div>
                        <h2>{{ $food->name }}</h2>
                        <p>{{ $food->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    </form>
</body>
</main>

@endsection
