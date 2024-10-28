@extends('layouts.main')

@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/control.css') }}" />
    </head>

    <body>
            @error('error')
                <div>
                    <span>{{ $message }}</span>
                </div>
            @enderror
            

            <main class="table">
            <form action="" method="post">
                <section class="table-header">
                    
                    <h1>Edit</h1>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="search-bar">
                        <input type="text" placeholder="Search Your Foods">
                        <img src="" alt="">
                    </div>
                </section>
                <section class="table-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Food's Name</th>
                                    <th>Description</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($foods as $food)
                                    <tr>
                                        <td>{{ $food->id }}</td>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->description }}</td>
                                        <td class="update-button"><a href="{{ route('foods.update-form', ['food' => $food->id]) }}">Update</a></td>
                                        <td class="delete-button"><a href="{{ route('foods.delete-form', ['food' => $food->id]) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            <tbody>
                        </table>
                </section>
        </main>
    </body>

@endsection
