@extends('layouts.main')

@section('content')

<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/comment.css') }}" />
</head>
<main>
<body>
    @csrf
    <form action="" method="post">
    <div class="content">
      <div class="container">
        <div class="comment-container">
            <div class="comment-card">
                <h3 class="title">Title</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, beatae ipsam vitae consequuntur eligendi deserunt quibusdam fuga sunt, 
                    soluta excepturi eveniet, porro commodi maiores fugit inventore quod? Magnam, dolorem necessitatibus!
                </p>
                <div class="comment-footer">
                    <div class="edit">Edit</div>
                    <div class="delete">Delete</div>
                </div>
            </div>
        </div>
        <div class="comment-container">
            <div class="comment-card">
                <h3 class="title">Title</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, beatae ipsam vitae consequuntur eligendi deserunt quibusdam fuga sunt, 
                    soluta excepturi eveniet, porro commodi maiores fugit inventore quod? Magnam, dolorem necessitatibus!
                </p>
                <div class="comment-footer">
                    <div class="edit">Edit</div>
                    <div class="delete">Delete</div>
                </div>
            </div>
        </div>
        <div class="comment-container">
            <div class="comment-card">
                <h3 class="title">Title</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, beatae ipsam vitae consequuntur eligendi deserunt quibusdam fuga sunt, 
                    soluta excepturi eveniet, porro commodi maiores fugit inventore quod? Magnam, dolorem necessitatibus!
                </p>
                <div class="comment-footer">
                    <div class="edit">Edit</div>
                    <div class="delete">Delete</div>
                </div>
            </div>
        </div>
        <div class="comment-container">
            <div class="comment-card">
                <h3 class="title">Title</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, beatae ipsam vitae consequuntur eligendi deserunt quibusdam fuga sunt, 
                    soluta excepturi eveniet, porro commodi maiores fugit inventore quod? Magnam, dolorem necessitatibus!
                </p>
                <div class="comment-footer">
                    <div class="edit">Edit</div>
                    <div class="delete">Delete</div>
                </div>
            </div>
        </div>
        <div class="comment-container">
            <div class="comment-card">
                <h3 class="title">Title</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, beatae ipsam vitae consequuntur eligendi deserunt quibusdam fuga sunt, 
                    soluta excepturi eveniet, porro commodi maiores fugit inventore quod? Magnam, dolorem necessitatibus!
                </p>
                <div class="comment-footer">
                    <div class="edit">Edit</div>
                    <div class="delete">Delete</div>
                </div>
            </div>
        </div>
      </div>
        <div class="commentbar-container">
            <input class="comment-input" type="text" placeholder="comment">
        </div>
    </div>
    </form>

</body>

</main>
</html>
@endsection
