@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            color: #333;
        }
        .container {
            width: 80%;
            max-width: 1200px;
            margin: 80px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 200px
        }
        h1 {
            color: black;
            text-align: center;
            padding-bottom: 20px;
        }
        h2 {
            color: black;
            text-align: center;
            padding-top: 20px;
        }
        p {
            line-height: 1.6;
        }
        .team {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
            margin-top: 30px;
        }
        .team-member {
            flex: 1 1 200px;
            text-align: center;
        }
        .team-member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .team-member h3 {
            margin-top: 10px;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>About Us</h1>
        <p>
                ยินดีต้อนรับสู่เว็บไซต์แจกสูตรอาหารของเรา! ที่นี่เรารวมสูตรอาหารหลากหลายเมนูที่ทำง่ายและอร่อย
            เพื่อให้ทุกคนสามารถนำไปทำเองที่บ้านได้ ไม่ว่าจะเป็นอาหารไทย อาหารนานาชาติ ของหวาน หรือของทานเล่น
            เรามีครบทุกหมวดหมู่เพื่อให้คุณเลือกสรรตามความชอบ
        </p>
        <p>
                จุดมุ่งหมายของเราคือการแบ่งปันความสุขผ่านอาหาร เพราะเราเชื่อว่าอาหารเป็นสิ่งที่เชื่อมโยงผู้คนเข้าด้วยกัน
            และทำให้ช่วงเวลาที่ใช้ร่วมกันมีความหมายมากยิ่งขึ้น เราหวังว่าเว็บไซต์นี้จะช่วยให้คุณได้ลองทำอาหารใหม่ๆ
            และสนุกไปกับการทำอาหารในทุกๆ วัน
        </p>

        <h2>ทีมงานของเรา</h2>
        <div class="team">
            <div class="team-member">
                <h3>ชื่อทีมงานคนที่ 1</h3>
                <p>ผู้เชี่ยวชาญ</p>
            </div>
            <div class="team-member">
                <h3>ชื่อทีมงานคนที่ 2</h3>
                <p>ผู้เชี่ยวชาญ</p>
            </div>
            <div class="team-member">
                <h3>ชื่อทีมงานคนที่ 3</h3>
                <p>ผู้เชี่ยวชาญ</p>
            </div>
            <div class="team-member">
                <h3>ชื่อทีมงานคนที่ 4</h3>
                <p>ผู้เชี่ยวชาญ</p>
            </div>
        </div>
    </div>
</body>
</html>
@endsection