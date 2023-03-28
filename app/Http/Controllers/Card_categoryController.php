<?php

namespace App\Http\Controllers;

use App\Models\Card_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Card_categoryController extends Controller
{
    function show(){
      $carts =  Card_category::all();
      return view('card_category.show',compact('carts'));
    }
    function add(){
        return view('card_category.add');
    }
    function create(Request $request){
//        dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'note' => 'required',
                'price' => 'required',


            ],
            [
                'required'=>':attribute không được để trống',

            ],
            [
                'name'=>'Tên danh mục',
                'note'=>'Ghi chú',
                'price'=>'Chi phí',
            ]
        );

        Card_category::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'desc'=>$request->note,
            'slug'=>Str::slug($request->name),
            'status'=>1
        ]);
    }

    function edit($slug){
      $carts = Card_category::where('slug',$slug)->first();
      return view('card_category.edit',compact('carts'));
    }

    function update(Request $request, $slug){
        $request->validate(
            [
                'name' => 'required',
                'note' => 'required',
                'price' => 'required',


            ],
            [
                'required'=>':attribute không được để trống',

            ],
            [
                'name'=>'Tên danh mục',
                'note'=>'Ghi chú',
                'price'=>'Chi phí',
            ]
        );

        Card_category::where('slug',$slug)->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'desc'=>$request->note,
            'slug'=>Str::slug($request->name),
            'status'=>1
        ]);

        return redirect(route('card_category.show'));
    }
   function delete($slug){
        Card_category::where('slug',$slug)->update([
            'status'=>0
        ]);
       session()->flash('edit-Card_category', 'Cập nhật trạng thái thành công!');
        return redirect(route('card_category.show'));
   }
}
