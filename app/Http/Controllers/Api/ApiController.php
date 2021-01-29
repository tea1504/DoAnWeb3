<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
    public function layThongTinNhanVien(){
        $result = DB::select('SELECT * FROM nhanvien, chucvu WHERE nhanvien.cvu_ma = chucvu.cvu_ma');
        // dd($result);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
}