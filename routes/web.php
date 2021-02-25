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

Route::get('/admin/khenthuong/print', 'Admin\KhenthuongController@print')->name('admin.khenthuong.print');
Route::get('/admin/khenthuong/pdf', 'Admin\KhenthuongController@pdf')->name('admin.khenthuong.pdf');
Route::get('/admin/khenthuong/excel', 'Admin\KhenthuongController@excel')->name('admin.khenthuong.excel');
Route::resource('/admin/khenthuong','Admin\KhenthuongController', ['as' => 'admin']);
Route::resource('/admin/khenthuong', 'Admin\KhenThuongController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/nhanvien/print-chitiet/{id}', 'Admin\NhanVienController@printDetail')->name('admin.nhanvien.print.chitiet');
Route::get('/admin/nhanvien/print', 'Admin\NhanVienController@print')->name('admin.nhanvien.print');
Route::get('/admin/nhanvien/pdf-chitiet/{id}', 'Admin\NhanVienController@pdfDetail')->name('admin.nhanvien.pdf.chitiet');
Route::get('/admin/nhanvien/pdf', 'Admin\NhanVienController@pdf')->name('admin.nhanvien.pdf');
Route::get('/admin/nhanvien/excel', 'Admin\NhanVienController@excel')->name('admin.nhanvien.excel');
Route::resource('/admin/nhanvien', 'Admin\NhanVienController', ['as' => 'admin']);

Route::get('/admin/tuyendung/print', 'Admin\TuyenDungController@print')->name('admin.tuyendung.print')->middleware('auth');
Route::get('/admin/tuyendung/pdf', 'Admin\TuyenDungController@pdf')->name('admin.tuyendung.pdf')->middleware('auth');
Route::get('/admin/tuyendung/excel', 'Admin\TuyenDungController@excel')->name('admin.tuyendung.excel')->middleware('auth');
Route::resource('/admin/tuyendung','Admin\TuyenDungController', ['as' => 'admin'])->middleware('auth');
Route::get('/admin/tuyendung/create','Admin\TuyenDungController@create')->name('admin.tuyendung.create')->middleware('auth');

Route::get('/admin/kyluat/print', 'Admin\KyLuatController@print')->name('admin.kyluat.print');
Route::get('/admin/kyluat/pdf', 'Admin\KyLuatController@pdf')->name('admin.kyluat.pdf');
Route::get('/admin/kyluat/excel', 'Admin\KyLuatController@excel')->name('admin.kyluat.excel');
Route::resource('/admin/kyluat', 'Admin\KyLuatController', ['as' => 'admin'])->middleware('auth');


Route::get('/admin/quanhegiadinh/print', 'Admin\QuanHeGiaDinhController@print')->name('admin.quanhegiadinh.print');
Route::get('/admin/quanhegiadinh/pdf/{id?}', 'Admin\QuanHeGiaDinhController@pdf')->name('admin.quanhegiadinh.pdf');
Route::get('/admin/quanhegiadinh/excel', 'Admin\QuanHeGiaDinhController@excel')->name('admin.quanhegiadinh.excel');
Route::resource('/admin/quanhegiadinh', 'Admin\QuanHeGiaDinhController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/vanbang/create_id/{id?}', 'Admin\VanBangController@create_id')->name('admin.vanbang.create_id')->middleware('auth');
Route::get('/admin/vanbang/print/{id?}', 'Admin\VanBangController@print')->name('admin.vanbang.print')->middleware('auth');
Route::get('/admin/vanbang/pdf/{id?}', 'Admin\VanBangController@pdf')->name('admin.vanbang.pdf')->middleware('auth');
Route::get('/admin/vanbang/excel', 'Admin\VanBangController@excel')->name('admin.vanbang.excel')->middleware('auth');
Route::resource('/admin/vanbang', 'Admin\VanBangController', ['as' => 'admin'])->middleware('auth');


Route::get('/admin/luong/print', 'Admin\LuongController@print')->name('admin.luong.print')->middleware('auth');
Route::get('/admin/luong/pdf', 'Admin\LuongController@pdf')->name('admin.luong.pdf')->middleware('auth');
Route::get('/admin/luong/excel', 'Admin\LuongController@excel')->name('admin.luong.excel')->middleware('auth');
Route::resource('/admin/luong', 'Admin\LuongController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/quatrinhcongtac/create_id/{id?}', 'Admin\QuaTrinhCongTacController@create_id')->name('admin.quatrinhcongtac.create_id')->middleware('auth');
Route::get('/admin/quatrinhcongtac/print/{id?}', 'Admin\QuaTrinhCongTacController@print')->name('admin.quatrinhcongtac.print')->middleware('auth');
Route::get('/admin/quatrinhcongtac/pdf/{id?}', 'Admin\QuaTrinhCongTacController@pdf')->name('admin.quatrinhcongtac.pdf')->middleware('auth');
Route::get('/admin/quatrinhcongtac/excel', 'Admin\QuaTrinhCongTacController@excel')->name('admin.quatrinhcongtac.excel')->middleware('auth');
Route::resource('admin/quatrinhcongtac', 'Admin\QuaTrinhCongTacController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/thongtinchung/print', 'Admin\ThongTinChungController@print')->name('admin.thongtinchung.print')->middleware('auth');
Route::get('/admin/thongtinchung/pdf', 'Admin\ThongTinChungController@pdf')->name('admin.thongtinchung.pdf')->middleware('auth');
Route::get('/admin/thongtinchung/excel', 'Admin\ThongTinChungController@excel')->name('admin.thongtinchung.excel')->middleware('auth');
Route::resource('admin/thongtinchung', 'Admin\ThongTinChungController', ['as' => 'admin'])->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/quequan/print', 'Admin\QueQuanController@print')->name('admin.quequan.print')->middleware('auth');
Route::get('/admin/quequan/pdf', 'Admin\QueQuanController@pdf')->name('admin.quequan.pdf')->middleware('auth');
Route::get('/admin/quequan/excel', 'Admin\QueQuanController@excel')->name('admin.quequan.excel')->middleware('auth');
Route::resource('admin/quequan', 'Admin\QueQuanController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/noisinh/print', 'Admin\NoiSinhController@print')->name('admin.noisinh.print')->middleware('auth');
Route::get('/admin/noisinh/pdf', 'Admin\NoiSinhController@pdf')->name('admin.noisinh.pdf')->middleware('auth');
Route::get('/admin/noisinh/excel', 'Admin\NoiSinhController@excel')->name('admin.noisinh.excel')->middleware('auth');
Route::resource('admin/noisinh', 'Admin\NoiSinhController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/role/print', 'Admin\RoleController@print')->name('admin.role.print')->middleware('auth');
Route::get('/admin/role/pdf', 'Admin\RoleController@pdf')->name('admin.role.pdf')->middleware('auth');
Route::get('/admin/role/excel', 'Admin\RoleController@excel')->name('admin.role.excel')->middleware('auth');
Route::resource('/admin/role','Admin\RoleController', ['as' => 'admin'])->middleware('auth');

Route::resource('admin/lichsubanthan', 'Admin\LichSuBanThanController', ['as' => 'admin'])->middleware('auth');

Route::resource('admin/user', 'Admin\UserController')->middleware('auth');
Route::get('admin/thongke', 'Admin\ThongKeController@index')->name('admin.thongke.index')->middleware('auth');

Route::resource('admin/chucvu', 'Admin\ChucVuController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/congviec', 'Admin\CongViecController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/dantoc', 'Admin\DanTocController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/tongiao', 'Admin\TonGiaoController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/donvi', 'Admin\DonViController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/donviquanly', 'Admin\DonViQuanLyController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/tinh', 'Admin\TinhController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/huyen', 'Admin\HuyenController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/xa', 'Admin\XaController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/loaivbcc', 'Admin\LoaiVBCCController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
Route::resource('admin/phucap', 'Admin\PhuCapController', ['as' => 'admin'])->middleware(['auth', 'can:admin']);
