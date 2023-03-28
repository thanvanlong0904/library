<?php

use App\Models\Book_category;


?>
@extends('layouts.admin')

@section('admin')
    <h5 class="text-center py-3" style="background: #9200c8 ; color: white ; text-transform: uppercase">CHI TIẾT SÁCH: {{$books->name}}</h5>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <img src="{{asset( $books->image)}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-5">
                <div class="mt-3" >
                    <p style="color: red"><span class="fw-bold" style="color: black">Tác giả : </span> {{$books->author}} <span class="badge text-bg-success">Nhà xuất bản : {{$books->company}}</span></p>
                    <p style="font-size: 22px">{{$books->name}}</p>
                    <p style="font-size: 22px ; font-weight: bold ; color: #098ba6"><span STYLE="font-size: 16px ; color: black">Mã sách : </span> {{$books->code}}</p>
                    <p style="font-size: 20px" ><span class="badge text-bg-primary">Tái bản lần : {{$books->republish}}</span> <span class="badge text-bg-info text-white">Danh mục : {{Book_category::find($books->book_category)->name}}</span></p>
                    <p style="font-size: 20px" ><span class="badge text-bg-danger">Số lượng  : {{$books->qty}}</span> <a href="{{route('book.edit',$books->slug)}}" style="text-decoration: none ; font-size: 18px" class="badge text-bg-warning">Chỉnh sửa sách</a></p>

                </div>
            </div>
        </div>
        <div class="row">
            <h4>MÔ TẢ SÁCH : </h4>
            <p>{{$books->desc}}</p>
    </div>
@endsection
