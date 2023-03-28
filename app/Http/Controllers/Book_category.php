<?php

namespace App\Http\Controllers;

use App\Models\Book_category as ModelsBook_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Book_category extends Controller
{
    function show(){
        $category = ModelsBook_category::get();
        return view('book_category.show',compact('category'));
    }
    function add(){
        return view('book_category.add');
    }

    function create(Request $request){
        // dd($request->all());

       $slug = Str::slug($request->name);
        $request->validate(
            [
                'name' => 'required',

            ],
            [
                'required'=>':attribute không được để trống',

            ],
            [
                'name'=>'Tên danh mục',

            ]
        );
        // dd($request->all());
        $file = $request->file;
        if(!empty($file)){
            $file->move('asset/images', $file->getClientOriginalName());
            $image = 'asset/images/' . $file->getClientOriginalName();
        }else{
            $image = 'asset/images/logo_icon.jpg';
        }
       ModelsBook_category::create([
            'name' => $request->name,
            'image' =>$image,
            'desc'=> $request->not,
            'slug'=>$slug,
           'status'=>1

        ]);
      return redirect(route('book_category.show'));
    }
    function edit($slug){
        $cate =\App\Models\Book_category::where('slug',$slug)->first();
        return view('book_category.edit',compact('cate'));
    }

    function update(Request $request, $slug){
        $slug = Str::slug($request->name);
        $request->validate(
            [
                'name' => 'required',

            ],
            [
                'required'=>':attribute không được để trống',

            ],
            [
                'name'=>'Tên danh mục',

            ]
        );
        // dd($request->all());
        $file = $request->file;
        $post = \App\Models\Book_category::where('slug',$slug)->first();
        if(!empty($file)){
            $file->move('asset/images', $file->getClientOriginalName());
            $image = 'asset/images/' . $file->getClientOriginalName();
        }else{
            $image = $post->image;
        }
        ModelsBook_category::where('slug',$slug)->update([
            'name' => $request->name,
            'image' =>$image,
            'desc'=> $request->not ?? '',
            'slug'=>Str::slug($request->name),
            'status'=>1

        ]);
        return redirect(route('book_category.show'));
    }

    function delete($id){
        \App\Models\Book_category::where('id',$id)->update([
            'status'=>0
        ]);
        return redirect(route('book_category.show'));
//        dd($id);
    }
}
