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
            <h4 class="mb-0">SỬA THÔNG TIN THÀNH VIÊN</h4>
        </div>
        <div id="content-book" class="mt-3">
            <form class="row g-3"  action="{{route('member.update',$tellers->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Tên thành viên</label>
                    <input type="text" class="form-control" id="inputEmail4" name="name" value="{{$tellers->name}}">
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">ảnh</label>
                    <input type="file" class="form-control" id="inputAddress" placeholder="1234 Main St" name="file">
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Loại thẻ</label>
                    <select class="form-select" aria-label="Default select example" name="cart">
                        @foreach($categorys as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Số điện thoại</label>
                    <input type="phone" class="form-control" id="inputCity" name="phone" value="{{$tellers->phone}}">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputCity" name="email" value="{{$tellers->email}}">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="inputCity" name="address" value="{{$tellers->address}}">
                </div>
                <div class="col-md-6">
                    <label for="inputZip" class="form-label">CCCD/CMNN</label>
                    <input type="number" class="form-control" id="inputZip" name="cccd" value="{{$tellers->cccd}}">
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-5">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
