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
                            <h2>{{$category->name}}</h2>
                        </div>
                    </div>

                    @error('error')
                        <div>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                        <div class="data-container">
                            @forelse ($foods as $food)
                                <a class="linkfoods" href="{{ route('foods.view', $food->id) }}">
                                    <div class="card">
                                        <div class="imgwrap">
                                            <img src="{{ asset('images/' . $food->img) }}" alt="">
                                        </div>
                                        <h2>{{ $food->name }}</h2>
                                        <p>{{ $food->description }}</p>
                                    </div>
                                </a>
                            @empty
                                <div>
                                    <h3 class="nofood">No foods available in this category.</h3>
                                </div>
                            @endforelse
                        </div>
                    </div>
            </form>

        </body>
    </main>
@endsection
