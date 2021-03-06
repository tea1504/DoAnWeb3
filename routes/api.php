<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/nhanvien', 'Api\ApiController@layThongTinNhanVien')->name('api.thongtin.nhanvien');
Route::get('/nhanvien/ten', 'Api\ApiController@layTenNhanVienDangNhap')->name('api.ten.nhanvien');
Route::get('/nhanvien/soluong', 'Api\ApiController@laySoLuongNhanVien')->name('api.nhanvien.soluong');
Route::get('/nhanvien/soluong/nu', 'Api\ApiController@laySoLuongNhanVienNu')->name('api.nhanvien.soluong.nu');
Route::get('/nhanvien/tuoi/trungbinh', 'Api\ApiController@laySoTuoiTrungBinh')->name('api.nhanvien.tuoi.trungbinh');
Route::get('/nhanvien/tuoi/trongkhoang', 'Api\ApiController@layTuoiTrongKhoang')->name('api.nhanvien.tuoi.trongkhoang');
Route::get('/tuyendung/ngaylam/trungbinh', 'Api\ApiController@laySoNamLamViecTrungBinh')->name('api.tuyendung.ngaylam.trungbinh');
Route::get('/vbcc', 'Api\ApiController@layVBCCNhanVien')->name('api.nhanvien.vbcc');
Route::get('/ngach/bac', 'Api\ApiController@layBacTheoNgach')->name('api.ngach.bac');
Route::get('/luong/heso', 'Api\ApiController@layHeSoLonNhat')->name('api.luong.heso');
Route::get('/quatrinhlamviec', 'Api\ApiController@layQuaTrinhLamViec')->name('api.nhanvien.quatrinhlamviec');
Route::get('/quatrinhcongtac', 'Api\ApiController@layQuaTrinhCongTac')->name('api.nhanvien.quatrinhcongtac');
Route::get('/congviechientai', 'Api\ApiController@layCongViecHienTai')->name('api.nhanvien.congviechientai');
Route::get('/nhanvien/daydu', 'Api\ApiController@layThongTinNhanVienDayDu')->name('api.nhanvien.daydu');
Route::get('/huyen', 'Api\ApiController@layHuyen')->name('api.huyen');
Route::get('/xa', 'Api\ApiController@layXa')->name('api.xa');
Route::get('/quanhegiadinh', 'Api\ApiController@layQuanHeGiaDinh')->name('api.nhanvien.quanhegiadinh');
Route::get('/khenthuong', 'Api\ApiController@layKhenThuong')->name('api.nhanvien.khenthuong');
Route::get('/kyluat', 'Api\ApiController@layKyLuat')->name('api.nhanvien.kyluat');
Route::get('/dantoc/thongke', 'Api\ApiController@thongKeDanToc')->name('api.dantoc.thongke');
Route::get('/tongiao/thongke', 'Api\ApiController@thongKeTonGiao')->name('api.tongiao.thongke');
Route::get('/donvi/thongke', 'Api\ApiController@thongKeDonVi')->name('api.donvi.thongke');
