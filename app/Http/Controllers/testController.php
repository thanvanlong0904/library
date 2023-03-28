<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    function  test(){
        return view('test.test');
    }

    function show(Request $request){
        dd($request->all());
    }
}
