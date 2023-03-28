<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Mail\SendMail;
use App\Mail\SignMail;
use App\Models\Card;
use App\Models\Custom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function mail(){
        $all_custom = Custom::all();

        foreach ($all_custom as $item){
            if($difference = Carbon::parse($item->date_pay)->diffInDays(Carbon::parse($item->created_at)) < 2 && $item->status == 1 && $item->status_rent == 1){
                $custom = Card::where('code',$item->code)->first();
                $data = [
                    'name'=> $custom->name,
                    'email'=>$custom->mail,
                    'code'=>$custom->code,
                    'date_rent'=>$custom->created_at->format('d/m/y'),
                     'date_pay'=>Carbon::parse($custom->date_pay)->format('d/m/y')
                ];
                Mail::to($custom->email)->send(new SendMail($data));
                session()->flash('m-s', 'Gửi mail thành công !');
                return redirect('danh-sach-thue.html');
            }
        }

    }

    function sign($code){
        $custom = Card::where('code',$code)->first();
        $data = [
            'name'=> $custom->name,
            'email'=>$custom->email,
            'code'=>$custom->code,
            'date_rent'=>$custom->created_at->format('d/m/y'),
            'date_pay'=>Carbon::parse($custom->date_pay)->format('d/m/y')
        ];
        Mail::to($custom->email)->send(new SignMail($data));
        session()->flash('m-sign', 'Gửi mail đăng ký thành công  !');
        $cards = Card::where('code',$code)->first();
        return view('member.detail',compact('cards'));
    }

    function order($code){
        $user = Custom::where('code_rent',$code)->first();
        $custom = Card::where('code',$user->code)->first();
        $data = [
            'name'=> $custom->name,
            'email'=>$custom->mail,
            'code'=>$custom->code,
            'date_rent'=>$custom->created_at->format('d/m/y'),
            'date_pay'=>Carbon::parse($custom->date_pay)->format('d/m/y')
        ];
        Mail::to($custom->email)->send(new OrderMail($data));

        return redirect(route('cart.detail',$code));
    }
}
