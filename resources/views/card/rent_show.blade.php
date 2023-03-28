<?php

use App\Models\Book_category;
use Carbon\Carbon;
use App\Models\Card;

?>
@extends('layouts.admin')

@section('admin')
    <style>
        #show-member #header-book {
            background: #9200c8;
            color: white;
        }
        .creater{
            color: white;
            background-color: #9200c8;
            max-height:35px;
            font-weight: bold;
            display: block;
            padding:0px 10px;
            border-radius: 5px;
            line-height: 35px;

        }
        .creater:hover{
            color: yellow;


        }
    </style>
    <div id="show-member">
        <div id="header-book" CLASS="text-center py-2">
            <h4 class="mb-0">DANH SÁCH MƯỢN SÁCH VỀ NHÀ</h4>
        </div>
        <div class="mt-3 d-flex justify-content-between">
            <div class="d-flex ">
                <a class="creater" href="danh-sach-thue.html?status=1" style="text-decoration:none ;">SỐ ĐƠN ĐANG MƯỢN <span style="color: fuchsia"> ( {{$count1}} )</span></a>
                <a class="creater ms-1 bg-success" href="danh-sach-thue.html?status=2" style="text-decoration:none ;" >SỐ ĐƠN THÀNH CÔNG <span style="color: darkkhaki"> ( {{$count2}} )</span></a>
                <a class="creater ms-1 bg-success" href="gui-mail" style="text-decoration:none ;" >GỬI MAIL <span style="color: darkkhaki"> ( {{$t}} )</span></a>
{{--                <a class="creater ms-1 bg-info" href="thue-sach.html" style="text-decoration:none ;" >Giỏ sách <span class="text-danger">({{Cart::count()}}  )</span></a>--}}
            </div>

            <div>
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo mã thuê ?" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
        @if (session()->has('m-s'))
            <div class="alert alert-success">
                {{ session()->get('m-s') }}
            </div>
        @endif
        @if($count > 0)
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên </th>
                <th scope="col">Mã mượn</th>
                <th scope="col">số lượng sách</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày mượn</th>
                <th scope="col">Ngày trả</th>
                <th scope="col">số ngày còn lại</th>
                <th scope="col">Tác vụ</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @php
             $t=1;
                @endphp
            @foreach($name as $names)
                <tr>
                    <th scope="row">{{$t++}}</th>

                    <td><a href="{{route('cart.detail',$names->code_rent)}}">{{Card::where('code',$names->code)->first()->name}}</a> </td>
                    <td>{{$names->code_rent}}</td>
                    <td>{{$names->qty}}</td>
                    <td>
                        @if($names->status == 1)
                            <span class="badge badge-success" style="background: #9200c8">Đang mượn</span>
                        @endif
                            @if($names->status == 2)
                                <span class="badge badge-success" style="background: #098ba6">Đã trả sách</span>
                            @endif



                        </td>
                    <td>{{$names->created_at->format('d/m/y')}}</td>
                    <td>{{ Carbon::parse($names->date_pay)->format('d/m/y')}}</td>
                    <td>
                    @if($names->status == 1)
                        <span>{{$difference = Carbon::parse($names->date_pay)->diffInDays(Carbon::parse($names->created_at))}}</span>
                    @endif
                    @if($names->status == 2)
                        <span class="badge badge-success" style="background: #098ba6">Đã trả sách</span>
                        @endif
                    </td>

                    <td><a href="{{route('cart.status',$names->code_rent)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
{{--                        <a href="" class="btn btn-danger btn-sm rounded-0 text-white" type="button"--}}
{{--                           data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>--}}
{{--                        <a href="{{route('cart.add',$list_book->id)}}" class="btn btn-info btn-sm rounded-0 text-white" type="button" data-toggle="tooltip"--}}
{{--                           data-placement="top" title="add"> <i class="fa-solid fa-plus"></i></a>--}}
                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>
        @endif
        @if($count<1)
            <p>Kết quả bạn tìm không có !</p>
        @endif
        {{ $name->onEachSide(1)->links('pagination::bootstrap-4') }}

    </div>
    <div id="show-member">
        <div id="header-book" CLASS="text-center py-2" style="background: #098ba6">
            <h4 class="mb-0">DANH SÁCH MƯỢN SÁCH ĐỌC TẠI CHỖ</h4>
        </div>
        <div class="mt-3 d-flex justify-content-between">
            <div class="d-flex ">
                <a class="creater" href="danh-sach-thue.html?statu1s=1" style="text-decoration:none ;">SỐ ĐƠN ĐANG MƯỢN <span style="color: fuchsia"> ( {{$count3}} )</span></a>
                <a class="creater ms-1 bg-success" href="danh-sach-thue.html?statu1s=2" style="text-decoration:none ;" >SỐ ĐƠN THÀNH CÔNG <span style="color: darkkhaki"> ( {{$count4}} )</span></a>

                {{--                <a class="creater ms-1 bg-info" href="thue-sach.html" style="text-decoration:none ;" >Giỏ sách <span class="text-danger">({{Cart::count()}}  )</span></a>--}}
            </div>

            <div>
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search1" placeholder="Tìm kiếm theo mã mượn ?" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
        @if (session()->has('m-s'))
            <div class="alert alert-success">
                {{ session()->get('m-s') }}
            </div>
        @endif
        @if($count > 0)
            <table class="table mt-3">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên </th>
                    <th scope="col">Mã mượn</th>
                    <th scope="col">số lượng sách</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Giờ mượn</th>
{{--                    <th scope="col">Ngày trả</th>--}}
{{--                    <th scope="col">số ngày còn lại</th>--}}
                    <th scope="col">Tác vụ</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @php
                    $t=1;
                @endphp
                @foreach($name1 as $name1s)
                    <tr>
                        <th scope="row">{{$t++}}</th>

                        <td>{{Card::where('code',$name1s->code)->first()->name}}</td>
                        <td>{{$name1s->code_rent}}</td>
                        <td>{{$name1s->qty}}</td>

                        <td>
                            @if($name1s->status == 1)
                                <span class="badge badge-success" style="background: #9200c8">Đang mượn</span>
                            @endif
                            @if($name1s->status == 2)
                                <span class="badge badge-success" style="background: #098ba6">Đã trả sách</span>
                            @endif



                        </td>
                        <td>{{$name1s->created_at->format('h:i:s')}}</td>
{{--                        <td>{{ Carbon::parse($name1s->date_pay)->format('d/m/y')}}</td>--}}
                        <td>

                      <td><a href="{{route('cart.status',$name1s->code_rent)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                              data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
{{--                                                <a href="" class="btn btn-danger btn-sm rounded-0 text-white" type="button"--}}
{{--                                                data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>--}}
{{--                                          <a href="{{route('cart.add',$list_book->id)}}" class="btn btn-info btn-sm rounded-0 text-white" type="button" data-toggle="tooltip"--}}
{{--                          data-placement="top" title="add"> <i class="fa-solid fa-plus"></i></a>--}}
                        </td>


                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
        {{ $name1->links('pagination::bootstrap-4') }}
        @if($count<1)
            <p>Kết quả bạn tìm không có !</p>
        @endif
    </div>
@endsection
