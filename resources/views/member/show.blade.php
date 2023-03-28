@extends('layouts.admin')

@section('admin')
    <style>
        #show-member #header-book {
            background: #9200c8;
            color: white;
        }
    </style>
    <div id="show-member">
        <div id="header-book" CLASS="text-center py-2">
            <h4 class="mb-0">DANH SÁCH THÀNH VIÊN</h4>
        </div>
        <div class="mt-3 d-flex justify-content-between">
            <div class="d-flex " style="justify-content: center; align-items: center">
                <style>
                     .athanhvien{
                        text-decoration: none;
                        background-color: seagreen;
                        height: 35px;
                        color: white;
                     }
                     .athanhvien:hover{
                        background-color: #9200c8;
                    color: white;                   }
                </style>
                <a class="athanhvien py-1 px-2" href="/them-thanh-vien.html">THÊM THÀNH VIÊN</a>
                <form action="{{route('excel.export')}}">
                    <table>

                        <tr>
                            <td>
                                <select name="status" id="">
                                    <option value="1">Thành viên</option>
                                    <option value="0">Thành viên hết hạn</option>
                                </select>
                            </td>
                            <td><button style="font-size: 13px">Xuất Excel</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div>
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo mã  ?" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>

         @if($count_member != 0)
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Mã thành viên</th>
                <th scope="col">Điện thoại</th>
                <th scope="col">Loại thẻ</th>
                <th scope="col">Cccd</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tác vụ</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @php $t = 1;   @endphp
            @foreach($members as $member)
                <tr>
                    <th scope="row">{{$t++;}}</th>
                    <td><a style="text-decoration: none" href="{{route('member.detail',$member->slug)}}">{{$member->name}}</a> </td>
                    <td>{{$member->code}}</td>
                    <td>0{{$member->phone}}</td>
                    @if($member->card_type == 1)
                        <td>Thẻ đọc sách</td>
                    @endif
                    @if($member->card_type == 2)
                        <td>Thẻ đọc và mượn</td>
                    @endif


                    <td>{{$member->cccd}}</td>
                    <td>
                        @if($member->status == 1)
                            <span class="badge badge-success" style="background: #098ba6"> Thành viên</span>
                        @endif

                            @if($member->status == 0)
                                <span class="badge badge-dark" style="background: black"> Thẻ hết hạn</span>
                            @endif
                    </td>
                    <td><a href="{{route('member.edit',$member->slug)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{route('member.delete',$member->slug)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                           data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>

                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>
            {{ $members->links('pagination::bootstrap-4') }}
        @endif
        @if($count_member == 0)
            <div class="text-center mt-4">
                <h4>Không có kết quả bạn vừa vìm kiếm</h4>
            </div>
        @endif
    </div>
@endsection
