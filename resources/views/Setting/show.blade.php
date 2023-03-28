@extends('layouts.admin')

@section('admin')
<style>
     @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
                        body {
                            background-color: #ffffff;
                            color: #000000;
                        }

                        body.dark-mode {
                            background-color: #333333;
                            color: #ffffff;
                        }

                        #check1 {
                            cursor: pointer;
                            margin-left: 190px;
                            font-size: 23px;
                        }

                        /* #check1:before {
                            width: 30px;
                            height: 30px;
                            background: white;
                            content: "";
                            display: block;
                            border-radius: 50%;
                            position: absolute;
                            left: 2px;
                            top: 2.5px;
                            cursor: pointer;
                            transition: 1s;
                        }

                        #check1:checked:before {
                            left: 37px;
                            background: black;
                        } */

                       

                        ul {
                            list-style: none;
                        }
                        li{
                            border-bottom: 1px solid beige;
                        }
                    </style>

                    <div class="col-md-6" style="box-shadow: -2px 1px 5px grey; border-radius: 3px">
                        <div>
                            <ul style="background: white ; border-radius: 5px" >
                                <li style=" display: flex;align-items: center; padding: 8px 0px; font-size: 16px; background: white"><span style="margin-right: 12px; background: black; color: white; border-radius: 50%; width: 40px; height: 40px; line-height: 40px; text-align: center"><i id="check-icon" class="bi bi-moon-stars-fill"></i></span><span>Chế độ nền </span> <i id="check1" class="bi bi-moon-stars-fill"></i></li>
                                <li style=" display: flex;align-items: center; padding: 8px 0px; font-size: 16px; background: white"><span style="margin-right: 12px; background: black; color: white; border-radius: 50%; width: 40px; height: 40px; line-height: 40px; text-align: center"><i class="fa-solid fa-right-from-bracket"></i></span><span>Đăng xuất </span> <span style="margin-left: 160px"><a
                                        href="/thoat" style="text-decoration: none">THOÁT</a></span></li>
                            </ul>
                        </div>
                    </div>

@endsection
