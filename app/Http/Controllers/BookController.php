<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use mysql_xdevapi\CollectionModify;

class BookController extends Controller
{
    function show(Request $request){
        if (!empty($request->search)) {
//
            $list_books = Book::where('code', 'like', "%{$request->search}%")->paginate(5);
            $list_books->appends(['search' => $request->search]);
        } else {
            $list_books = Book::paginate(5);
        }
//        $count = $tellers->count();

        return view('book.show', compact('list_books'));

//        $list_books = Book::all();
//        return view('book.show',compact('list_books'));
    }
    function add(){
      $cate =   Book_category::where('status',1)->get();
      return view('book.add', compact('cate'));
    }

    function create(Request $request){
        // dd($request->all());
        $slug = Str::slug($request->name);
        $code ="MS-".Str::upper(Str::random(5)) ;
        $request->validate(
            [
                'name' => 'required',
                'desc' => 'required',
                'author' => 'required',
                'company' => 'required',
                'republish' => 'required',
                'qty' => 'required',

            ],
            [
                'required'=>':attribute không được để trống',

            ],
            [
                'name'=>'Tên sách',
                'desc'=>'Mô tả',
                'author'=>'Tên tác giả',
                'qty'=>'Số lượng',
                'company'=>'Nhà xuất bản',
                'republish'=>'Tái bản ',

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
        Book::create([
           'name'=> $request->name,
           'slug'=>$slug,
           'image'=>$image,
           'company'=>$request->company,
           'author'=>$request->author,
           'republish'=>$request->republish,
           'desc'=>$request->desc,
           'book_category'=>$request->cate,
           'qty'=>$request->qty,
           'status'=>1,
           'code'=>$code
        ]);
        $slug1 = Book::latest()->first()->slug;
      return  redirect(route('book.detail',$slug1));
    }

    function edit($slug){
        $book = Book::where('slug',$slug)->first();
        $cate = Book_category::all();
        return view('book.edit', compact('book','cate'));
    }
    function update(Request  $request, $slug){
        $request->validate(
            [
                'name' => 'required',
                'desc' => 'required',
                'author' => 'required',
                'company' => 'required',
                'republish' => 'required',
                'qty' => 'required',

            ],
            [
                'required'=>':attribute không được để trống',

            ],
            [
                'name'=>'Tên sách',
                'desc'=>'Mô tả',
                'author'=>'Tên tác giả',
                'qty'=>'Số lượng',
                'company'=>'Nhà xuất bản',
                'republish'=>'Tái bản ',

            ]
        );
        $post = Book::where('slug',$slug)->first();
        $file = $request->file;

        if(!empty($file)){
            $file->move('asset/images', $file->getClientOriginalName());
            $image = 'asset/images/' . $file->getClientOriginalName();
        }else{
            $image = $post->image;
        }
        if($request->book_category == 0){
            $cate = $post->book_category;
        }else{
            $cate = $request->cate;
        }
       Book::where('slug', $slug)->update([
           'name'=> $request->name,
           'slug'=>Str::slug($request->name),
           'image'=>$image,
           'company'=>$request->company,
           'author'=>$request->author,
           'republish'=>$request->republish,
           'desc'=>$request->desc,
           'book_category'=>$cate,
           'qty'=>$request->qty,
           'status'=>1,


        ]);

        return redirect(route('book.show'));
    }

    function detail($slug){
        $books =  Book::where('slug',$slug)->first();
       return view('book.detail',compact('books'));
    }

    function delete($slug){
        Book::where('slug',$slug)->update([
            'status'=>0
        ]);
        return redirect(route('book.show'));
    }
}
