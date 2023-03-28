@extends('layouts.admin')

@section('admin')
<div id="home">
    <div id="header-home" CLASS="text-center py-2">
        <h4 class="mb-0">TRANG CHỦ</h4>
    </div>
    <div id="content-home" class="mt-3">
        <div class="row justify-content-between">

            <div class="col-md-3  ">
                <div class="content text-center shadow-lg ">
                    <h5 class="py-2">TỔNG SỐ THÀNH VIÊN</h5>
                    <div class="pb-2">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <span>{{$member}}</span> <span>THÀNH VIÊN</span>
                </div>
            </div>
            <div class="col-md-3  ">
                <div class="content text-center shadow-lg ">
                    <h5 class="py-2">SỐ ĐƠN ĐANG THUÊ</h5>
                    <div class="pb-2">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <span>{{$count_crent}}</span> <span>ĐƠN</span>
                </div>
            </div>
            <div class="col-md-3  ">
                <div class="content text-center shadow-lg ">
                    <h5 class="py-2">SỐ ĐƠN THÀNH CÔNG</h5>
                    <div class="pb-2">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <span>{{$count_sucess}}</span> <span>ĐƠN</span>
                </div>
            </div>
            <div class="col-md-3  ">
                <div class="content text-center shadow-lg ">
                    <h5 class="py-2">TỔNG SỐ ĐƠN THUÊ</h5>
                    <div class="pb-2">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <span>{{$count_crent + $count_sucess}}</span> <span>CUỐN</span>
                </div>
            </div>
            <div class="col-md-3  mt-4">
                <div class="content text-center shadow-lg ">
                    <h5 class="py-2">TỔNG SỐ SÁCH TRONG KHO</h5>
                    <div class="pb-2">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <span>{{$count_book}}</span> <span>CUỐN</span>
                </div>
            </div>
        </div>




        </div>
    </div>
</div>
@endsection
