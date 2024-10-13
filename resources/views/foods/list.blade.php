@extends('layouts.main')

@section('content')

<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/food-list.css') }}" />
</head>
<main>
<body>
    @csrf
    <form action="" method="post">

        <h1>Food</h1>
        <div class="container">
          <div class="card">
            <div class="imgwrap">
              <img src="{{ asset('img/10.jpg') }}" alt="">
            </div>
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
          <div class="card">
            <div class="imgwrap">
              <img src="{{ asset('img/6.webp') }}" alt="">
            </div>
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
          <div class="card">
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
          <div class="card">
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
          <div class="card">
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
          <div class="card">
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
          <div class="card">
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
          <div class="card">
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
          <div class="card">
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis nesciunt temporibus, dolorum corrupti eum maiores quisquam nulla autem, quae illo vero porro. Fugiat voluptas incidunt rerum magni aliquid voluptates iure.</p>
          </div>
        </div>

    </form>
    
</body>
</main>
</html>

@endsection