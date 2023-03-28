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
            <h4 class="mb-0">DANH MỤC SÁCH</h4>
        </div>
        <div class="mt-3 d-flex justify-content-between">
            <div class="d-flex ">
                <a class="creater" href="{{route('book_category.add')}}" style="text-decoration:none ;">Thêm danh mục</a>
            </div>
            <div>
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm ?" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>


        <table class="table mt-3">
            <thead>
            <tr>

                <th scope="col">STT</th>
                <th scope="col">Ảnh </th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Tác vụ</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @php
             $t=1;
            @endphp
            @foreach($category as $category1)
                <tr>

                    <th scope="row">{{$t++}}</th>

                    <td><img width="50px" height="50px" src="{{asset($category1->image)}}" alt=""></td>
                    <td>{{$category1->name}}</td>
                    <td>{{$category1->desc}}</td>

                    <td>
                        @if($category1->status == 1)
                            <span class="badge badge-success" style="background: #098ba6"> Hoạt động</span>
                        @endif
                        @if($category1->status == 0)
                            <span class="badge badge-success" style="background: black">Ngừng Hoạt động</span>
                        @endif
                    </td>

                    <td>{{$category1->created_at->format('d/m/y')}}</td>
                    <td><a href="{{route('book_category.edit',$category1->slug)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{route('book_category.delete',$category1->id)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>

                    </td>


                </tr>
          @endforeach

            </tbody>
        </table>


    </div>
@endsection
