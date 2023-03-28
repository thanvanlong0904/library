<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<style>
    #wrapper #header{
        background: #9200c8;
        color: white;
        padding: 10px 0px;
    }
    #body .list-sidebar li{
        font-size: 20px;
        border-bottom: 1px solid #a4a4a4;
        background: black;
    }
    #body .list-sidebar li:hover{
        font-size: 20px;
        border-bottom: 1px solid #a4a4a4;
        background: #fcfcfc;
    }
    #body .list-sidebar li a{
        color: #6f6f6f;
        display: block;
    }
    #body #header-home {
        background: #9200c8;
        color: white;
        font-weight: bold;

    }
    #body #content-home .content h5{
        font-size: 13px;
    }
    #body #content-home .content i{
        font-size: 29px;
        color: #098ba6;
    }
    body.dark {
                            background: violet;
                            transition: 1s;

                        }

</style>
<body class="">
<div id="wrapper">
    <div id="header" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <a href=""><img  width="70px" src="assets/images/logo1.png" alt=""></a>
                </div>
                <div class="col-md-8 text-center">
                    <h3>HỆ THỐNG QUẢN LÝ THƯ VIỆN </h3>
                </div>
                <div class="col-md-2">
                    <div class="float-end">
                        <i class="fa-solid fa-universal-access"></i>
                        <span><a href="/thoat" style="text-decoration: none; color: white">Đăng xuất</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="body" class="mt-5">
        <div class="container">
            <div class="row justify-content-between">
            <div class="col-md-3 ">
                    <ul class="list-unstyled ms-2 list-sidebar">
                        <li class="  text-center"><a class="text-decoration-none  py-3" href="/"><i class="fa-solid fa-house-chimney me-2"></i> <span>TRANG CHỦ</span></a></li>
                        <li class="  text-center"><a class="text-decoration-none  py-3" href="{{route('member.show')}}"><i class="fa-solid fa-list-check"></i> <span>QUẢN LÝ THÀNH VIÊN</span></a></li>
                        <li class="  text-center"><a class="text-decoration-none  py-3" href="{{route('book_category.show')}}"><i class="fa-solid fa-photo-film"></i> <span>DANH MỤC SÁCH</span></a></li>
                        <li class="  text-center"><a class="text-decoration-none  py-3" href="{{route('card_category.show')}}"><i class="fa-solid fa-network-wired"></i> <span>DANH MỤC THẺ</span></a></li>
                        
                    </ul>
                </div>

                <div class="col-md-8  p-0">
               @yield('admin')
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    let body = document.body
    let input = document.getElementById('check1')
    let value_more = localStorage.getItem('more')

    if(value_more == 'true'){
        body.classList.add('dark')
    }
    input.addEventListener('click',function (){
      let more =  body.classList.toggle('dark')
      input.classList.toggle('bi-moon-stars-fill')
      input.classList.toggle('bi-brightness-high')

      let check_icon = document.getElementById('check-icon')
      check_icon.classList.toggle('bi-moon-stars-fill')
      check_icon.classList.toggle('bi-brightness-high')
        localStorage.setItem('more',more)
    })

</script>
</html>
