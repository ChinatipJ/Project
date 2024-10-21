@extends('layouts.main')

@section('content')

<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/food-list.css') }}" />
</head>
<main>
<body>
  @error('error')
      <div>
        <span>{{$message}}</span>
      </div>
  @enderror
    @csrf
    <form action="" method="post">

        <h1>Food</h1>
        <div class="container">
        @forelse ($foods as $food)
  <a class="linkfoods" href="{{ route('foods.view', $food->id) }}">
        <div class="card">
          <div class="imgwrap">
            <img src="{{asset('images/'.$food->img)}}" alt="">
          </div>
          <h2>{{$food->name}}</h2>
          <p>{{$food->description}}</p>
        </div>
    </a>
        @empty
        <div>
            <h3 class="nofood">No foods available in this category.</h3>
        </div>
        @endforelse

         
        </div>

    </form>
    
</body>
</main>
</html>

@endsection