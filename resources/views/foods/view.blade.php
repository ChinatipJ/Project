@extends('layouts.main')

@section('content')

<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/food-view.css') }}" />
</head>
<main>
<body>
    @csrf
    <form action="" method="post">
        <div class="row">
            <div class="imgwrap">
                <img src="{{ asset('img/10.jpg') }}" alt="">
            </div>
            <div class="contentwrap">
                <div class="content">
                    <span class="textwrap">
                        <span><h2>Food Name</h2></span>
                    </span>
                    <h3>Lorem ipsum</h3>
                    <div class="scrollbox">
                        <div class="scrollbox-inner">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eligendi totam placeat voluptas, laboriosam modi dolorum corporis distinctio quod quas, dicta esse incidunt debitis fugit? Sapiente, ut culpa! Numquam, temporibus.
                    Sapiente corrupti, sequi officia earum quas odio quae nihil. Tenetur, cupiditate ex optio odit nisi nam nobis officiis a praesentium aliquid, voluptates, provident facere iusto alias aliquam eaque dignissimos? Quaerat!
                    Nesciunt illum culpa rem nemo quibusdam sint ea modi doloremque deleniti minima eaque id voluptate et, delectus numquam a libero voluptates officia? Inventore ab veniam nostrum. Soluta illum ut ipsum.
                    Atque facilis consectetur dicta perferendis dolore, vero harum nisi? Ullam possimus officia, dolorum dolorem placeat amet earum! Nobis nulla beatae eum totam, sequi omnis ea possimus incidunt, ex, nesciunt fuga.
                    Eligendi recusandae voluptates laboriosam porro sit pariatur rem consectetur, culpa eius vitae a ipsam. Libero molestias quod veniam magnam reprehenderit! Consequatur voluptatum ab beatae ea ullam dolore veritatis recusandae eaque?</p>
                        </div>
                    </div>
                    <a href="">Review</a>
                </div>
            </div>
        </div>
    </form>

</body>

</main>
</html>
@endsection
