<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\Card_category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function show(Request $request){

        if(!empty($request->search)){
            $members = Card::where('code','like',"%{$request->search}%")->paginate(5);;
        }else{
            $members = Card::paginate(5);;
        }
       $count_member = count($members);
//        dd($count_member);
        return view('member.show',compact('members','count_member'));
    }
    function add(){
        $cate  = Card_category::all();
        return view('member.add', compact('cate'));
    }
    function create(Request $request){
//        dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'cart' => 'required',
                'address' => 'required',
                'cccd' =>'required',
            ],
            [
                'required'=>':attribute không được để trống',

            ],
            [
                'name'=>'Tên thành viên',
                'phone'=>'Số điện thoại',
                'cart'=>'Loại thẻ thành viên',
                'cccd'=>'Căn cước/chứng minh',
                'address'=>'Địa chỉ'
            ]
        );
        $file = $request->file;
        if(!empty($file)){
            $file->move('asset/images', $file->getClientOriginalName());
            $image = 'asset/images/' . $file->getClientOriginalName();
        }else{
            $image = 'asset/images/logo_icon.jpg';
        }
       $slug = Str::slug($request->name) ;
      $ramdom  = Str::upper(Str::random(5)) ;
      $code = 'LL'.$ramdom;
          $test_slug = Card::all();
          foreach ($test_slug as $item){
              if(strcmp($item->slug,$slug) == 0){
                  $slug = $slug."-1";
              }
        }


        Card::create([
            'name' => $request->name,
            'slug' => $slug,
            'phone' => $request->phone,
            'card_type' => $request->cart,
            'cccd' => $request->cccd,
            'image' => $image,
            'address'=>$request->address,
            'status'=>1,
            'code'=> $code,
            'email'=>$request->email ?? ''

        ]);
        $code = Card::latest()->first()->code;
       return redirect(route('mail.sign',$code))->with('status','Thêm thành công');
    }

     function edit(Request $request, $slug)
     {

         $tellers = Card::where('slug', $slug)->first();
//         dd($tellers->name);
         $categorys = Card_category::get();
         return view('member.edit', compact('tellers', 'categorys'));
     }

     function update(Request $request,$slug)
     {
//        dd($request->all());
         $request->validate(
             [
                 'name' => 'required',
                 'phone' => 'required',
                 'cart' => 'required',
                 'address' => 'required',
                 'cccd' =>'required',
                 'email' =>'required',
             ],
             [
                 'required'=>':attribute không được để trống',

             ],
             [
                 'name'=>'Tên thành viên',
                 'phone'=>'Số điện thoại',
                 'cart'=>'Loại thẻ thành viên',
                 'cccd'=>'Căn cước/chứng minh',
                 'address'=>'Địa chỉ'
             ]
         );
         $post = Card::where('slug',$slug)->first();
         $file = $request->file;

         if(!empty($file)){
             $file->move('asset/images', $file->getClientOriginalName());
             $image = 'asset/images/' . $file->getClientOriginalName();
         }else{
             $image = $post->image;
         }
         Card::where('slug', $slug)->update([
             'name' => $request->name,
             'slug' => Str::slug($request->name),
             'phone' => $request->phone,
             'card_type' => $request->cart,
             'cccd' => $request->cccd,
             'image' => $image,
             'address'=>$request->address,
             'status'=>1,
             'email'=>$request->email

         ]);

         return redirect(route('member.show'));
     }

    function delete($slug){
        Card::where('slug',$slug)->update([
            'status'=>0
        ]);
        return redirect('danh-sach-thanh-vien.html');

    }

    function detail($slug){

        $cards = Card::where('slug',$slug)->first();
//        $cate = \App\Models\Book_category::all();
//        dd($cate);
        return view('member.detail',compact('cards'));
    }
}
