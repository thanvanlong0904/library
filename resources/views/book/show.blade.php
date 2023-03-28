<?php

use App\Models\Book_category;


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
            <h4 class="mb-0">DANH SÁCH SÁCH</h4>
        </div>
        <div class="mt-3 d-flex justify-content-between">
            <div class="d-flex ">
                <a class="creater" href="them-sach.html" style="text-decoration:none ;">Thêm sách</a>
                <a class="creater ms-1 bg-success" href="danh-muc-sach.html" style="text-decoration:none ;" >Danh mục sách</a>
                <a class="creater ms-1 bg-info" href="thue-sach.html" style="text-decoration:none ;" >Giỏ sách <span class="text-danger">({{Cart::count()}}  )</span></a>
                <a class="creater ms-1 bg-warning" href="xoa-gio-hang" style="text-decoration:none ;" >Xóa giỏ sách </a>
            </div>
            <div>
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo mã sách ?" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('qty_book'))
            <div class="alert alert-danger">
                {{ session()->get('qty_book') }}
            </div>
        @endif
        @if (session()->has('delete'))
            <div class="alert alert-success">
                {{ session()->get('delete') }}
            </div>
        @endif
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh </th>
                <th scope="col">Tên sách</th>
                <th scope="col">Mã sách</th>
{{--                <th scope="col">Danh mục</th>--}}
                <th scope="col">Số Lượng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Tác vụ</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @php
            $t=1;
            @endphp
            @foreach($list_books as $list_book)
                <tr>
                    <th scope="row">{{$t++}}</th>

                    <td><img width="50px" height="50px" src="{{asset($list_book->image)}}" alt=""></td>
                    <td><a href="{{route('book.detail',$list_book->slug)}}">{{$list_book->name}}</a> </td>
                    <td>{{$list_book->code}}</td>

{{--                    <td>{{Book_category::find($list_book->book_category)->name  }}</td>--}}
                    <td>
                        @if($list_book->qty > 0)

                            {{$list_book->qty}}
                        @endif
                            @if($list_book->qty < 1)
                                <span class="badge badge-success" style="background: black"> Hết sách</span>

                            @endif

                    </td>
                    <td>
                        @if($list_book->status == 1)
                            <span class="badge badge-success" style="background: #098ba6"> Đang lưu hành</span>
                        @endif
                            @if($list_book->status == 0)
                                <span class="badge badge-success" style="background: black"> Dừng lưu hành</span>
                            @endif

                    </td>
                    <td>{{$list_book->created_at->format('d/m/y')}}</td>
                    <td><a href="{{route('book.edit',$list_book->slug)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{route('book.delete',$list_book->slug)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        <a href="{{route('cart.add',$list_book->id)}}" class="btn btn-info btn-sm rounded-0 text-white" type="button" data-toggle="tooltip"
                           data-placement="top" title="add"> <i class="fa-solid fa-plus"></i></a>
                    </td>


                </tr>
          @endforeach

            </tbody>
        </table>

        {{ $list_books->onEachSide(0)->links() }}
    </div>
@endsection
