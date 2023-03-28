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
        <div id="header-book" class="text-center py-2 " style="background: #9200c8 ; color: white">
            <h4 class="mb-0">MƯỢN SÁCH</h4>
        </div>
        <form class="row g-3" action="{{route('cart.create')}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div id="content-book" class="mt-3">
                <div class="row  mt-3">
                    <div class="col-md-6">
                        <p class="fw-bold text-center">Thông tin sách mượn</p>
                        <ul style="list-style: none">
                            @foreach(Cart::Content() as $item)
                            <li ><span>{{$item->name}}</span> <small class="ms-5"> x {{$item->qty}}</small></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Nhập mã người mượn sách</label>
                            <input type="text" class="form-control" id="inputEmail4" name="name">
                            <small style="color: red"><?php if(isset($erorr) ){
                                    echo $erorr;
                                }   ?></small>

                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Ngày dự kiến trả</label>
                            <input type="datetime-local" class="form-control" id="inputEmail4" name="date">


                        </div>
                        <div class="form-group mt-3">
                            <label for="sel1">Hình thức mượn:</label>
                            <select class="form-control" id="sel1" name="status_rent">
                                <option value="1">Mượn về nhà</option>
                                <option value="0">Đọc tại chỗ</option>

                            </select>
                        </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-5 mt-4">Mượn sách</button>
                </div>
            </div>
        </form>
    </div>
@endsection
