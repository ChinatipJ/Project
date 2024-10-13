@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" />
<body>
    <form action="" method="post">
    @csrf
    <div class="container">
        <h1 class="title">DISH DELIGHT</h1>
        <div class="photo-gallery">

            <div class="column">
                <div class="photo">
                    <img src="{{ asset('img/10.jpg') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/5.jpg') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/11.jpg') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/6.webp') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/13.jpg') }}" alt="">
                </div>
            </div>

            <div class="column">
                <div class="photo">
                    <img src="{{ asset('img/3.jpg') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/4.jpg') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/12.jpg') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/9.webp') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/15.jpeg') }}" alt="">
                </div>
            </div>

            <div class="column">
                <div class="photo">
                    <img src="{{ asset('img/7.webp') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/8.webp') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/1.jpg') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/13.jpg') }}" alt="">
                </div>
                <div class="photo">
                    <img src="{{ asset('img/14.jpg') }}" alt="">
                </div>
            </div>


        </div>
    </form>
</body>
</html>
@endsection