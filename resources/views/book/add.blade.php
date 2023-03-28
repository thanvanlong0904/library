@extends('layouts.admin')

@section('admin')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div id="add-book">
    <div id="header-book" CLASS="text-center py-2">
        <h4 class="mb-0">THÊM MỚI SÁCH</h4>
    </div>
    <div id="content-book" class="mt-3">
        <form class="row g-3"  action="{{route('book.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Tên sách</label>
                <input type="text" class="form-control" id="inputEmail4" name="name">
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">ảnh</label>
                <input type="file" class="form-control" id="inputAddress" placeholder="1234 Main St" name="file">
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">Danh mục sách</label>
                <select class="form-select" aria-label="Default select example" name="cate">
                   @foreach($cate as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Mô tả</label>
                <input type="text" class="form-control" id="inputCity" name="desc">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Tác giả</label>
                <input type="text" class="form-control" id="inputCity" name="author">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Nhà xuất bản</label>
                <input type="text" class="form-control" id="inputCity" name="company">
            </div>
            <div class="col-md-6">
                <label for="inputZip" class="form-label">Tái bản lần thứ</label>
                <input type="number" class="form-control" id="inputZip" name="republish">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Số lượng sách</label>
                <input type="number" class="form-control" id="inputCity" name="qty">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary px-5">Thêm mới</button>
            </div>
        </form>
    </div>
</div>
@endsection
