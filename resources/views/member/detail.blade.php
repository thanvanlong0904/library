<?php
use App\Models\Book_category;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
   <div id="w-cart" >
       <div class="container">
           <div class="row">
               <div class="col-md-4">

               </div>
               <div class="col-md-4   ">
                   @if (session()->has('m-sign'))
                       <div class="alert alert-success">
                           {{ session()->get('m-sign') }}
                       </div>
                   @endif
                   <h1 class="text-center text-white">THẺ THÀNH VIÊN</h1>
                   <div class="row " style="vertical-align: middle; background-color: blueviolet; border-top-left-radius: 8px;border-top-right-radius: 8px;">
                    <div class="col-md-3">
                        <div>
                            <img src="{{asset('asset/images/logo1.png')}} " alt="" class="img-fluid py-1">
                        </div>
                    </div>
                    <div class="col-md-9 d-flex fw-bold mt-3" style="font-size:17px ; color: white;">
                        <div>
                            <span>THƯ VIỆN MLV <br>THẺ THÀNH VIÊN </span>
                        </div>

                    </div>
                   </div>
                   <div class="row py-2" style="background-color: wheat; border-bottom-left-radius: 8px;border-bottom-right-radius: 8px;">
                      <div class="col-md-12">
                        <div class="row justify-content-center" >
                            <div class="col-md-4"><img src="{{asset($cards->image)}}" alt="" class="img-fluid"></div>
                        </div>
                      </div>
                      <div class="col-md-12 text-center text-success fw-bold mb-2">
                        <h4>{{$cards->name}}</h4>
                      </div>
                      <div class="col-md-12 text-center text-success">
                        <h5>LOẠI THẺ: <span  > {{\App\Models\Card_category::where('id',$cards->card_type)->first()->name}}</span></h5>
                      </div>
                      <div class="col-md-12 text-center text-success my-2">
                        <h5>MÃ THẺ: <span>{{$cards->code}}</span></h5>
                      </div>
                       <div class="col-md-12 text-center text-success">
                           <h5>EMAIL: <span>{{$cards->email}}</span></h5>
                       </div>
                      <div class="col-md-12 text-center text-success">
                        <h5>NGÀY CẤP: <span>{{$cards->created_at->format('d/m/Y')}}</span></h5>
                      </div>
                      <div class="col-md-12 text-center mt-5 pb-5">
                        <span>Lưu ý : Khi mượn sách, hoặc đọc tại thư viện phải mang theo thẻ hoặc nhớ mã thẻ</span>
                      </div>
                   </div>

                   <div class="row py-0 mt-4 ">
                    <div class="col-md-6 bg-info py-2">
                        <div class="text-center bg-info">
                            <a href="/" class="text-decoration-none d-block text-white fw-bold">TRANG CHỦ</a>
                        </div>
                    </div>
                    <div class="col-md-6 bg-danger py-2">
                        <div  class="text-center bg-danger">
                            <a href="{{route('member.edit',$cards->slug)}}" class="text-decoration-none bg-danger d-block text-white fw-bold">SỬA THÔNG TIN THẺ</a>
                        </div>
                    </div>
                   </div>
               </div>
               <div class="col-md-4 ">

               </div>
           </div>
       </div>
   </div>
</body>
</html>
