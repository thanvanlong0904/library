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
        <div id="header-book" CLASS="text-center py-3">
            <h4 class="mb-0 py-2" style="background-color:#9200c8 ; color:white;  ">SỬA DANH MỤC</h4>
        </div>
        <div id="content-book" class="mt-3">
            <form class="row g-3"  action="{{route('book_category.update',$cate->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="inputEmail4" name="name" value="{{$cate->name}}">
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">ảnh</label>
                    <input type="file" class="form-control" id="inputAddress" placeholder="1234 Main St" name="file">
                </div>


                <div class="col-md-6">
                    <label for="inputState" class="form-label">Ghi chú</label>
                    <input type="text" class="form-control" id="inputCity" name="not"  value="{{$cate->desc}}">
                </div>


                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
