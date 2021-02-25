<!doctype html>
<html lang="vn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ShinHRM</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/images/shin.png') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Source Sans Pro';
        }

        body {
            background-color: blanchedalmond;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .navbar {
            position: fixed;
            width: 100%;
            height: 50px;
            top: 0;
            z-index: 100;
        }

        .navbar ul {
            list-style-type: none;
        }

        .navbar ul li {
            float: right;
            line-height: 50px;
            margin: 0 10px;
        }

        .navbar ul li a {
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        .body {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        .content {
            position: relative;
            padding: 20px;
        }

        #logo {
            font-size: 100px;
            font-weight: lighter;
            padding: 0px 40px 0px 20px;
            border-radius: 0px 60px 60px 0px;
        }

        #logo span{
            position: relative;
            display: inline-block;
        }
        #slogan {
            text-align: right;
            padding-right: 40px;
        }

        #slogan span{
            position: relative;
            display: inline-block;
        }

        .content img {
            position: absolute;
            height: 300px;
            left: -200px;
            top: -40px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <ul>
            @auth
            <li><a href="{{ route('admin') }}">Dashboard</a></li>
            @else
            <li><a href="{{ route('login') }}">Đăng nhập</a></li>
            @endauth
            <li><a href="">Liên hệ</a></li>
        </ul>
    </div>
    <div class="body">
        <div class="content">
            <img src="{{asset('storage/images/shin.png')}}" alt="">
            <div id="logo">ShinHRM</div>
            <div id="slogan">Shin Human Resource Management</div>
        </div>
    </div>
    <script src="{{asset('vendor/animejs/anime.min.js')}}"></script>
    <script>
        const text = document.querySelector('#slogan');
        text.innerHTML = text.textContent.replace(/\S/g, '<span>$&</span>');
        const text2 = document.querySelector('#logo');
        text2.innerHTML = text2.textContent.replace(/\S/g, '<span>$&</span>');
        anime({
            targets: '.content img',
            translateX: [-100, 0],
            easing: 'easeOutExpo',
            duration: 1500
        });
        anime({
            targets: '#logo span',
            translateX: [-100, 0],
            opacity: [0, 1],
            easing: 'easeOutExpo',
            duration: 1500,
            delay: anime.stagger(100),
        })
        anime({
            targets: '#slogan span',
            easing: 'easeInOutExpo',
            translateX: [function(){
                return anime.random(-100, 100)
            }, 0],
            translateY: [function(){
                return anime.random(-100, 100)
            }, 0],
            rotate: [function(){
                return anime.random(-360, 360)
            }, 0],
            opacity: [0, 1],
            duration: 1500,
            delay: anime.stagger(20),
        })
    </script>
</body>

</html>