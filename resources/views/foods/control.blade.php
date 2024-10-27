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
            @csrf
            <form action="" method="post">
                <div class="title-wrapper">
                    <div class="title">
                        <h2>Food</h2>
                        <h2>Food</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <table>
                            <thead>
                                <tr>
                                    <td>id</td>
                                    <td>name</td>
                                    <td>description</td>
                                    <td>Update</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>

                            @foreach ($foods as $food)
                                
                            <tr>
                                <td>{{$food->id}}</td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->description}}</td>
                               <td><a
                                href="{{ route('foods.update-form', ['food' => $food->id,]) }}">Update</a></td>
                                <td><a
                                href="{{ route('foods.delete-form', ['food' => $food->id,]) }}">Delete</a></td>  
                            </tr>
                            
                            @endforeach
                        </table>
                    </div>

                </div>

        </body>
    </main>
@endsection
