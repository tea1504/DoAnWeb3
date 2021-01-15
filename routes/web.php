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
//     $data = [
//         'email' => '123',
//         'mes' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi corrupti magnam dolores pariatur expedita blanditiis at, consequatur id commodi inventore ea quibusdam. Qui suscipit totam cumque, quasi architecto veritatis enim.'
//     ];
//     return view('emails.lienhe')
//         ->with('data', $data);
// });

Route::get('/admin', 'Admin\AdminController@dashboard')->name('admin');
Route::get('/admin/lienhe', 'Admin\AdminController@lienHe')->name('admin.lienhe');
Route::post('/admin/lienhe/guiloinhan', 'Admin\AdminController@guiMaiTuLienHe')->name('admin.lienhe.guiloinhan');

Route::resource('/admin/nhanvien', 'Admin\NhanVienController', ['as' => 'admin']);

