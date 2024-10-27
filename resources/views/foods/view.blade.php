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
                <img src="{{ asset('images/' . $food->img) }}" alt="">
            </div>
            <div class="contentwrap">
                <div class="content">
                    <span class="textwrap">
                        <span><h2>{{$food->name}}</h2></span>
                    </span>
                    <h3>รายละเอียด</h3>
                    <div class="scrollbox">
                        <div class="scrollbox-inner">
                            <div class="dis">
                                {{$food->description}}
                            </div>
                              <div><h4>ส่วนประกอบ</h4></div>  
                            <div class="dis"><span>{{$food->ingredient}}</span></div>
                            <div><h4>เวลาที่ใช้ในการปรุงอาหาร</h4></div>  
                            <div class="dis"> {{$food->time}} นาที</div>
                            <div><h4>ผู้เขียนบทความ</h4></div>  
                            <div class="dis"> {{$food->user->name}}</div>
                        </div>
                    </div>
                    <a href="">Review</a>
                </div>
            </div>
        </div>

        <div class="comment-content">
            <div class="commentbig-container">
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
