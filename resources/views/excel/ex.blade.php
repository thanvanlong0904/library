<?php
use Carbon\Carbon;
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ddd;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>


<div>


</div>
<table class="table" style="border-collapse: collapse">
    <thead>
    <tr>
        <th>

        </th>
        <th style="font-weight: bold ; text-align: center">
            THƯ VIỆN MLV
        </th>
    </tr>
    <tr>
        <th>

        </th>
        <th style="font-weight: bold ; text-align: center">
            BAN QUẢN LÝ THƯ VIỆN
        </th>
    </tr>
    <tr>
        <th colspan="6" style="text-align: center ; font-size: 16px;font-weight: bold">DANH SÁCH THÀNH
            VIÊN <?php if ($status == 0) {
                echo "( Hết hạn )";
            } ?> </th>
    </tr>
   <tr></tr>
    <tr class="th-header">
        <th style="font-weight: bold ;border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">STT
        </th>
        <th style="font-weight: bold;border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">TÊN THÀNH VIÊN
        </th>
        <th style="font-weight: bold; border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">MÃ THÀNH VIÊN
        </th>
        <th style="font-weight: bold ; border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">SỐ ĐIỆN THOẠI</th>
        <th style="font-weight: bold ; border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">EMAIL</th>
        <th style="font-weight: bold ; border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">LOẠI THẺ</th>
    </tr>
    </thead>
    <tbody>
    @php
        $t=1;
    @endphp
    @foreach($users as $item)
        <tr>
            <th scope="row" style="border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">{{$t++}}</th>
            <td style="border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">{{$item->name}}</td>
            <td style="border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">{{$item->code}}</td>
            <td style="border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">0{{$item->phone}}</td>
            <td style="border: 1px solid #ddd;
            padding: 8px;
            text-align: left;">{{$item->email}}</td>
            <td style="border: 1px solid #ddd;
            padding: 18px;
            text-align: left;">{{\App\Models\Card_category::find($item->card_type)->name}}</td>
        </tr>
    @endforeach
    <tr></tr>
    <tr>
        <td></td>

        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" style="text-align: right; text-align: center; ">
            <i>Hà Tĩnh ,  ngày {{Carbon::now()->day}} tháng {{Carbon::now()->month}} năm {{Carbon::now()->year}}</i>
        </td>

    </tr>
    <tr>
         <td></td>

        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" style="text-align: right; text-align: center; font-weight: bold">
            NGƯỜI XUẤT FILE
        </td>

    </tr>
    <tr>
        <td></td>

        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" style="text-align: right; text-align: center; font-weight: bold">
            {{Auth::user()->name}}
        </td>

    </tr>
    </tbody>
</table>
</body>
</html>
