@extends('layouts.main')

@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/food-list.css') }}" />
</head>

<main>
<body>
    @error('error')
        <div>
            <span>{{ $message }}</span>
        </div>
    @enderror
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    @csrf
    <form action="" method="post">
    <div class="title-wrapper">
        <div class="title">
            <h2>Food</h2>
            <h2>Food</h2>
        </div>
    </div>
        <div class="container">
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
    </form>
</body>
</main>

@endsection
