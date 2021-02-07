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
Route::get('/vbcc', 'Api\ApiController@layVBCCNhanVien')->name('api.nhanvien.vbcc');
