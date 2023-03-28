<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Card;
use App\Models\Custom;
use App\Models\Custom_order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;

class CartController extends Controller
{

    function show(Request $request)
    {
        if (!empty($request->search)) {
            $name = Custom::where('code_rent', 'like', "%{$request->search}%")->where('status_rent', 1)->paginate(3);
            $name->appends(['search' => $request->search]);
        } else {
            if (!empty($request->status)) {
                $name = Custom::where('status', $request->status)->where('status_rent', 1)->paginate(3);
                $name->appends(['status' => $request->status]);
            } else {
                $name = Custom::where('status_rent', 1)->where('status_rent', 1)->paginate(3);
            }
        }

        if (!empty($request->search1)) {
            $name1 = Custom::where('code_rent', 'like', "%{$request->search1}%")->where('status_rent', 0)->paginate(3);
        } else {
            if (!empty($request->statu1s)) {

                $name1 = Custom::where('status', $request->statu1s)->where('status_rent', 0)->paginate(3);
            } else {
                $name1 = Custom::where('status_rent',0)->paginate(3);
            }
        }

        $count = $name->count();
        $custom1 = Custom::all();
        $t = 0;
        foreach ($custom1 as $custom2) {
            if ($difference = Carbon::parse($custom2->date_pay)->diffInDays(Carbon::parse($custom2->created_at)) < 2 && $custom2->status == 1 && $custom2->status_rent == 1) {
                $t++;
            }
        }
        $count1 = Custom::where('status', 1)->where('status_rent', 1)->count();
        $count2 = Custom::where('status', 2)->where('status_rent', 1)->count();

        $count3 = Custom::where('status', 1)->where('status_rent', 0)->count();
        $count4 = Custom::where('status', 2)->where('status_rent', 0)->count();
        return view('card.rent_show', compact('name', 'count', 'count1', 'count2', 't','name1','count3','count4'));
    }

    function cart(Request $request, $id)
    {

        $product = Book::where('id', $id)->first();

        if (Cart::count() > 4) {
            return redirect('danh-sach-sach.html');
        } else {
            if(Book::find($id)->qty >0){
                $qty_book = Book::find($id)->qty;
                Book::where('id',$id)->update([
                    'qty'=> $qty_book-1
                ]);
                Cart::add(['id' => $id,
                    'name' => $product->name,
                    'qty' => 1,
                    'price' => 9.99,
                    'options' => ['size' => 'large']
                ]);
//            dd(Cart::content());
                return redirect('danh-sach-sach.html');
            }else{
                session()->flash('qty_book','sách trong thư viện đã hết !');
                return redirect('danh-sach-sach.html');
            }

        }

    }

    function add()
    {
        if (Cart::Count() < 1) {
            session()->flash('message', 'Giỏ sách bạn đang trống !');
            return redirect(route('book.show'));
        } else {
            return view('card.rent');
        }


    }

    function create(Request $request)
    {
//         dd($request->date);
        $request->validate(
            [
                'name' => 'required',
                'date' => 'required',


            ],
            [
                'required' => ':attribute không được để trống',

            ],
            [
                'name' => 'Mã người thuê',
                'date' => 'Ngày dự kiến trả',


            ]
        );
        $date = Carbon::parse($request->date);
        $date->addMinutes(2);
        if (Card::where('code', $request->name)->count() == 1 && Card::where('code', $request->name)->first()->status == 1 ) {
            foreach (Cart::Content() as $book) {
                $qty = Book::where('id', $book->id)->first()->qty;
                Book::where('id', $book->id)->update([
                    'qty' => $qty - $book->qty
                ]);
            }
            $Customer = new Custom;
            $Customer->code = $request->name;
            $Customer->status = 1;
            $Customer->code_rent = "TS-" . Str::upper(Str::random('5'));
            $Customer->qty = cart::count();
            $Customer->date_pay = $date;
            $Customer->status_rent = $request->status_rent;
            $Customer->save();

            $cart = (cart::content());

            foreach ($cart as $item) {
                $detail_order = new Custom_order;
                $detail_order->id_book = $item->id;
                $detail_order->qty = $item->qty;
                $detail_order->id_custom = $Customer->id;
                $detail_order->save();
            }
            Cart::destroy();
             if( $Customer->status_rent == 1){
                 return redirect(route('mail.order',$Customer->code_rent));
             }else{
                 return redirect(route('cart.show'));
             }

        } else {
            return view('card.rent')->with('erorr', 'Mã người thuê ko có hoặc thẻ hết hạn xin mời nhập lại !');
        }
//        dd($request->all());
    }

    function status($code)
    {
       $custom =  Custom::where('code_rent',$code)->first()->id;
       $custom_order = Custom_order::where('id_custom',$custom)->get();
//       dd($custom_order);
       foreach ($custom_order as $item){
           $qty = Book::where('id', $item->id_book)->first()->qty;

           Book::where('id', $item->id_book)->update([
               'qty' => $qty + $item->qty
           ]);
       }
        custom::where('code_rent',$code)->update([
            'status' =>2
        ]);
        return redirect(route('cart.show'));
    }

    function destroy()
    {
        foreach (Cart::content() as $item){
            $qty = Book::find($item->id)->qty;
            Book::where('id',$item->id)->update([
                'qty'=>$qty + $item->qty
            ]);
        }
        Cart::destroy();
        session()->flash('delete','Xóa thành công giỏ sách !');
        return redirect('danh-sach-sach.html');
    }

    function detail($code){
        $cutom =  Custom::where('code_rent',$code)->first();
        $cutom_detail = Card::where('code',$cutom->code)->first();
        $custom_order = Custom_order::where('id_custom',$cutom->id)->get();
        return view('card.detail',compact('cutom','custom_order','cutom_detail'));
    }
}
