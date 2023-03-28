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
            <h4 class="mb-0">DANH MỤC THẺ</h4>
        </div>
        <div class="mt-3 d-flex justify-content-between">
            <div class="d-flex ">
                <a class="creater" href="them-sach-danh-muc-the.html" style="text-decoration:none ;">Thêm danh mục</a>

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

        @if (session()->has('edit-Card_category'))
            <div class="alert alert-success">
                {{ session()->get('edit-Card_category') }}
            </div>
        @endif
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Giá trị</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Tác vụ</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @php
            $t=1;
            @endphp
            @foreach($carts as $list_book)
                <tr>
                    <th scope="row">{{$t++}}</th>
                    <td>{{$list_book->name}} </td>
                    <td>{{$list_book->price}}</td>


                    <td>{{$list_book->desc}}</td>
                    <td>
                        @if($list_book->status == 1)
                        <span class="badge " style="background: darkgreen">Hoạt động</span></td>
                    @endif
                    @if($list_book->status == 0)
                        <span class="badge " style="background: black">Dừng hoạt động</span></td>
                    @endif
                    <td>{{$list_book->created_at->format('d/m/y')}}</td>
                    <td><a href="{{route('card_category.edit',$list_book->slug)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{route('card_category.delete',$list_book->slug)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>

                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>


    </div>
@endsection
