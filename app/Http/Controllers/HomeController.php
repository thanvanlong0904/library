<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Card;
use App\Models\Custom;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_custom = Custom::count();
        $count_crent = Custom::where('status',1)->count();
        $count_sucess = Custom::where('status',2)->count();
        $count_book  = Book::sum('qty');
        $member = Card::count();
//        dd($count_custom);
        return view('home', compact('count_custom','count_crent','count_sucess','member','count_book'));
    }
}
