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
    <style>
        /* Customer Information Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #dddddd;
        }

        /* Customer Details Section */
        .customer-details {
            margin-top: 20px;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }

        .customer-details h2 {
            margin-bottom: 20px;
        }

        .customer-details p {
            margin-bottom: 10px;
        }

        /* Product Details Section */
        .product-details {
            margin-top: 20px;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }

        .product-details h2 {
            margin-bottom: 20px;
        }

        .product-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .product-details th,
        .product-details td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .product-details th {
            background-color: #dddddd;
        }
    </style>
    </head>
    <body>
    <!-- Customer Information Table -->


    <!-- Customer Details Section -->
    <div class="customer-details">
        <h2>CHI TIẾT THÔNG TIN KHÁCH HÀNG</h2>

        <p>Name: {{$cutom_detail->name}}</p>
        <p>Email: {{$cutom_detail->email}}</p>
        <p>Phone: 0{{$cutom_detail->phone}}</p>
        <p>Nơi ở: {{$cutom_detail->address}}</p>
    </div>

    <!-- Product Details Section -->
    <div class="product-details">
        <h2>CHI TIẾT ĐƠN MƯỢN</h2>
        <table>
            <thead>
            <tr>
                <th>SỐ TT</th>
                <th>
                    Tên sách</th>
                <th>Số  lượng</th>
                <th>Ngày dự kiến trả</th>
            </tr>
            </thead>
            <tbody>
            @php
            $t=1;
            @endphp
          @foreach($custom_order as $item2)
            <tr>
                <td>{{$t++}}</td>
                <td>{{\App\Models\Book::find($item2->id_book)->name}}</td>
                <td>{{$item2->qty}}</td>
                <td>{{ \App\Models\Custom::find($item2->id_custom)->date_pay}}</td>
            </tr>
          @endforeach
            </tbody>
        </table>

    </div>
    <p class="mt-3"><a href="{{route('cart.show')}}" class="" style="text-decoration: none; background: seagreen;  color: white ; padding: 4px">QUẢN LÝ ĐƠN MƯỢN</a></p>
@endsection

