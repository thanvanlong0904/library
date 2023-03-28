<?php

use App\Http\Controllers\Book_category;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::middleware('auth')->group(function () {
    route::get('danh-sach-thanh-vien.html', [MemberController::class, 'show'])->name('member.show');
    route::get('them-thanh-vien.html', [MemberController::class, 'add'])->name('member.add');
    route::post('member/create', [MemberController::class, 'create'])->name('member.create');
    route::get('sua-thong-tin/{slug}', [MemberController::class, 'edit'])->name('member.edit');
    route::post('member/update/{slug}', [MemberController::class, 'update'])->name('member.update');
    route::get('thay-doi-trang-thai/{slug}', [MemberController::class, 'delete'])->name('member.delete');
    route::get('thong-tin-the/{slug}', [MemberController::class, 'detail'])->name('member.detail');
    route::get('{slug}/thue-sach.html', [OrderController::class, 'add'])->name('order.add');

// danh mục sách

    route::get('danh-muc-sach.html',[Book_category::class, 'show'])->name('book_category.show');
    route::get('them-danh-muc.html',[Book_category::class, 'add'])->name('book_category.add');
    route::post('book_category/create',[Book_category::class, 'create'])->name('book_category.craete');
    route::get('sua-danh-muc-sach/{slug}',[Book_category::class, 'edit'])->name('book_category.edit');
    route::post('update-danh-muc-sach/{slug}',[Book_category::class, 'update'])->name('book_category.update');
    route::get('book_category/delete/{id}',[Book_category::class, 'delete'])->name('book_category.delete');
//    cart
    route::get('them-sach-vao-gio/{id}',[CartController::class, 'cart'])->name('cart.add');
    route::get('thue-sach.html',[CartController::class, 'add'])->name('cart.add1');
    route::post('thue-sach-create.html',[CartController::class, 'create'])->name('cart.create');
    route::get('danh-sach-thue.html',[CartController::class, 'show'])->name('cart.show');
    route::get('tra-sach.html/{code}',[CartController::class, 'status'])->name('cart.status');
    route::get('xoa-gio-hang',[CartController::class, 'destroy'])->name('cart.destroy');
    route::get('chi-tiet-don-muon/{code}',[CartController::class, 'detail'])->name('cart.detail');

    // sách

    route::get('danh-sach-sach.html',[BookController::class, 'show'])->name('book.show');
    route::get('them-sach.html',[BookController::class, 'add'])->name('book.add');
    route::post('book-create',[BookController::class, 'create'])->name('book.create');
    route::get('chinh-sua-sach/{slug}.html',[BookController::class, 'edit'])->name('book.edit');
    route::post('book/{slug}',[BookController::class, 'update'])->name('book.update');
//    route::get('book/delete/{slug}',[BookController::class, 'delete'])->name('book.delete');
    route::get('chi-tiet-sach/{slug}',[BookController::class, 'detail'])->name('book.detail');
    route::get('sua-trang-thai-sach/{slug}',[BookController::class, 'delete'])->name('book.delete');

//    cart_category

    route::get('danh-sach-danh-muc-the.html',[\App\Http\Controllers\Card_categoryController::class, 'show'])->name('card_category.show');
    route::get('them-sach-danh-muc-the.html',[\App\Http\Controllers\Card_categoryController::class, 'add'])->name('card_category.add');
    route::post('card_category/create',[\App\Http\Controllers\Card_categoryController::class, 'create'])->name('cart_category.create');
    route::get('chinh-sua-the/{slug}',[\App\Http\Controllers\Card_categoryController::class, 'edit'])->name('card_category.edit');
    route::post('update-danh-muc-the/{slug}',[\App\Http\Controllers\Card_categoryController::class, 'update'])->name('card_category.update');
    route::get('thay-doi-trang-thai-the/{slug}',[\App\Http\Controllers\Card_categoryController::class, 'delete'])->name('card_category.delete');
//    route::get('danh-sach-sp-muc-the.html',[\App\Http\Controllers\Card_categoryController::class, 'show'])->name('card_category.show');


//mail
    route::get('gui-mail', [\App\Http\Controllers\MailController::class,'mail']);
    route::get('gui-mail-dang-ky/{code}', [\App\Http\Controllers\MailController::class,'sign'])->name('mail.sign');
    route::get('gui-mail-muon-sach/{code}', [\App\Http\Controllers\MailController::class,'order'])->name('mail.order');
//logout
    Route::get("/thoat", function(){
        Auth::logout();
        return redirect("login");
    });
    route::get('test-test',[\App\Http\Controllers\testController::class, 'test'])->name('test.test');
    route::post('test-test',[\App\Http\Controllers\testController::class, 'show'])->name('test.show');

    // cài đặt
    route::get('/cài-đặt',function(){
        return view('Setting.show');
    })->name('setting');
});
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
Route::get('/show-excel',[\App\Http\Controllers\excelController::class, 'show'])->name('excel.show');
Route::get('/export',[\App\Http\Controllers\excelController::class, 'export'])->name('excel.export');
