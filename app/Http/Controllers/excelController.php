<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class excelController extends Controller
{
    function show(){
        return view('excel.show');
    }
   function export(Request $request){
//        dd($request->all());
       return Excel::download(new UsersExport($request->status), 'data.xlsx');
   }
}
