<?php

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
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/test', function(){
//     return view('auth.test');
// });
Route::get('/admin', 'Admin\AdminController@dashboard')->name('admin')->middleware('auth');
Route::get('/admin/lienhe', 'Admin\AdminController@lienHe')->name('admin.lienhe')->middleware('auth');
Route::post('/admin/lienhe/guiloinhan', 'Admin\AdminController@guiMaiTuLienHe')->name('admin.lienhe.guiloinhan')->middleware('auth');

Route::get('/admin/nhanvien/print-chitiet/{id}', 'Admin\NhanVienController@printDetail')->name('admin.nhanvien.print.chitiet')->middleware('auth');
Route::get('/admin/nhanvien/print', 'Admin\NhanVienController@print')->name('admin.nhanvien.print')->middleware('auth');
Route::get('/admin/nhanvien/pdf-chitiet/{id}', 'Admin\NhanVienController@pdfDetail')->name('admin.nhanvien.pdf.chitiet')->middleware('auth');
Route::get('/admin/nhanvien/pdf', 'Admin\NhanVienController@pdf')->name('admin.nhanvien.pdf')->middleware('auth');
Route::get('/admin/nhanvien/excel', 'Admin\NhanVienController@excel')->name('admin.nhanvien.excel')->middleware('auth');
Route::resource('/admin/nhanvien', 'Admin\NhanVienController', ['as' => 'admin'])->middleware('auth');

Route::resource('/admin/khenthuong', 'Admin\KhenThuongController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/nhanvien/print-chitiet/{id}', 'Admin\NhanVienController@printDetail')->name('admin.nhanvien.print.chitiet');
Route::get('/admin/nhanvien/print', 'Admin\NhanVienController@print')->name('admin.nhanvien.print');
Route::get('/admin/nhanvien/pdf-chitiet/{id}', 'Admin\NhanVienController@pdfDetail')->name('admin.nhanvien.pdf.chitiet');
Route::get('/admin/nhanvien/pdf', 'Admin\NhanVienController@pdf')->name('admin.nhanvien.pdf');
Route::get('/admin/nhanvien/excel', 'Admin\NhanVienController@excel')->name('admin.nhanvien.excel');
Route::resource('/admin/nhanvien', 'Admin\NhanVienController', ['as' => 'admin']);

Route::get('/admin/tuyendung/print', 'Admin\TuyenDungController@print')->name('admin.tuyendung.print');
Route::get('/admin/tuyendung/pdf', 'Admin\TuyenDungController@pdf')->name('admin.tuyendung.pdf');
Route::get('/admin/tuyendung/excel', 'Admin\TuyenDungController@excel')->name('admin.tuyendung.excel');
Route::resource('/admin/tuyendung','Admin\TuyenDungController', ['as' => 'admin']);

Route::resource('/admin/kyluat', 'Admin\kyLuatController', ['as' => 'admin'])->middleware('auth');

Route::resource('/admin/quanhegiadinh', 'Admin\QuanHeGiaDinhController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/vanbang/create_id/{id?}', 'Admin\VanBangController@create_id')->name('admin.vanbang.create_id')->middleware('auth');
Route::get('/admin/vanbang/print/{id?}', 'Admin\VanBangController@print')->name('admin.vanbang.print')->middleware('auth');
Route::get('/admin/vanbang/pdf/{id?}', 'Admin\VanBangController@pdf')->name('admin.vanbang.pdf')->middleware('auth');
Route::get('/admin/vanbang/excel', 'Admin\VanBangController@excel')->name('admin.vanbang.excel')->middleware('auth');
Route::resource('/admin/vanbang', 'Admin\VanBangController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/tuyendung/create','Admin\TuyenDungController@create')->name('admin.tuyendung.create');
Route::get('/admin/luong/print', 'Admin\LuongController@print')->name('admin.luong.print')->middleware('auth');
Route::get('/admin/luong/pdf', 'Admin\LuongController@pdf')->name('admin.luong.pdf')->middleware('auth');
Route::get('/admin/luong/excel', 'Admin\LuongController@excel')->name('admin.luong.excel')->middleware('auth');
Route::resource('/admin/luong', 'Admin\LuongController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/quatrinhcongtac/create_id/{id?}', 'Admin\QuaTrinhCongTacController@create_id')->name('admin.quatrinhcongtac.create_id')->middleware('auth');
Route::get('/admin/quatrinhcongtac/print/{id?}', 'Admin\QuaTrinhCongTacController@print')->name('admin.quatrinhcongtac.print')->middleware('auth');
Route::get('/admin/quatrinhcongtac/pdf/{id?}', 'Admin\QuaTrinhCongTacController@pdf')->name('admin.quatrinhcongtac.pdf')->middleware('auth');
Route::get('/admin/quatrinhcongtac/excel', 'Admin\QuaTrinhCongTacController@excel')->name('admin.quatrinhcongtac.excel')->middleware('auth');
Route::resource('admin/quatrinhcongtac', 'Admin\QuaTrinhCongTacController', ['as' => 'admin'])->middleware('auth');

Route::resource('admin/thongtinchung', 'Admin\ThongTinChungController', ['as' => 'admin'])->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
