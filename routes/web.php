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

Route::get('/test', function(){
    return view('auth.test');
});

Route::get('/admin', 'Admin\AdminController@dashboard')->name('admin');
Route::get('/admin/lienhe', 'Admin\AdminController@lienHe')->name('admin.lienhe');
Route::post('/admin/lienhe/guiloinhan', 'Admin\AdminController@guiMaiTuLienHe')->name('admin.lienhe.guiloinhan');

Route::get('/admin/nhanvien/print-chitiet/{id}', 'Admin\NhanVienController@printDetail')->name('admin.nhanvien.print.chitiet');
Route::get('/admin/nhanvien/print', 'Admin\NhanVienController@print')->name('admin.nhanvien.print');
Route::get('/admin/nhanvien/pdf-chitiet/{id}', 'Admin\NhanVienController@pdfDetail')->name('admin.nhanvien.pdf.chitiet');
Route::get('/admin/nhanvien/pdf', 'Admin\NhanVienController@pdf')->name('admin.nhanvien.pdf');
Route::get('/admin/nhanvien/excel', 'Admin\NhanVienController@excel')->name('admin.nhanvien.excel');
Route::resource('/admin/nhanvien', 'Admin\NhanVienController', ['as' => 'admin']);

Route::resource('/admin/khenthuong', 'Admin\KhenThuongController', ['as' => 'admin']);

Route::resource('/admin/kyluat', 'Admin\kyLuatController', ['as' => 'admin']);
Route::resource('/admin/quanhegiadinh', 'Admin\QuanHeGiaDinhController', ['as' => 'admin']);

Route::get('/admin/vanbang/create_id/{id?}','Admin\VanBangController@create_id')->name('admin.vanbang.create_id');
Route::resource('/admin/vanbang','Admin\VanBangController', ['as' => 'admin']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
