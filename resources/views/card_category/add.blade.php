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
            <h4 class="mb-0">THÊM DANH MỤC THẺ</h4>
        </div>
        <div id="content-book" class="mt-3">
            <form class="row g-3"  action="{{route('cart_category.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="inputEmail4" name="name">
                </div>


                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Chi phí</label>
                    <input type="number" class="form-control" id="inputCity" name="price">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Ghi chú</label>
                    <input type="text" class="form-control" id="inputCity" name="note">
                </div>


                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-5">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
