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
});

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

Route::resource('/admin/kyluat', 'Admin\kyLuatController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/quanhegiadinh', 'Admin\QuanHeGiaDinhController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/vanbang/create_id/{id?}', 'Admin\VanBangController@create_id')->name('admin.vanbang.create_id')->middleware('auth');
Route::get('/admin/vanbang/print/{id?}', 'Admin\VanBangController@print')->name('admin.vanbang.print')->middleware('auth');
Route::get('/admin/vanbang/pdf/{id?}', 'Admin\VanBangController@pdf')->name('admin.vanbang.pdf')->middleware('auth');
Route::get('/admin/vanbang/excel', 'Admin\VanBangController@excel')->name('admin.vanbang.excel')->middleware('auth');
Route::resource('/admin/vanbang', 'Admin\VanBangController', ['as' => 'admin'])->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
