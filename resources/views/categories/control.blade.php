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
            
            @csrf
            <main class="table">
            <form action="" method="post">
                <section class="table-header">
                    <h1>Edit</h1>
                    @if (session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif
                        <div class="create-button">
                            <a href="{{ route('categories.create') }}">CREATE</a>
                        </div>
                </section>
                <section class="table-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CategoryName</th>
                                    <th>CreateDate</th>
                                    <th>UpdateDate</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td class="update-button"><a href="{{ route('categories.update-form', ['category' => $category->id]) }}">Update</a></td>
                                        <td class="delete-button"><a href="{{ route('categories.delete-form', ['category' => $category->id]) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            <tbody>
                        </table>
                </section>
        </main>
    </body>

@endsection
