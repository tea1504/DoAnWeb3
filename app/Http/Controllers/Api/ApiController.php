<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
    public function layThongTinNhanVien()
    {
        $result = DB::select('SELECT * FROM nhanvien, chucvu WHERE nhanvien.cvu_ma = chucvu.cvu_ma');
        // dd($result);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layTenNhanVienDangNhap(Request $request)
    {
        $parameter = [
            'username' => $request->username
        ];
        $result = DB::select('SELECT nv_hoTen, nv_anh FROM nhanvien WHERE username=:username', $parameter);
        // dd($result);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layVBCCNhanVien(Request $request)
    {
        if (!isset($request->nv_ma)) {
            $result = DB::select('SELECT * FROM vanbang_chungchi AS a, nhanvien AS b, loai_vbcc AS c WHERE a.nv_ma = b.nv_ma AND a.lvbcc_ma = c.lvbcc_ma ORDER BY a.nv_ma');
        } else {
            $parameter = [
                'nv_ma' => $request->nv_ma
            ];
            $result = DB::select('SELECT * FROM vanbang_chungchi AS a, nhanvien AS b, loai_vbcc AS c WHERE a.nv_ma = b.nv_ma AND a.lvbcc_ma = c.lvbcc_ma AND a.nv_ma=:nv_ma ORDER BY a.nv_ma', $parameter);
        }
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layBacTheoNgach(Request $request)
    {
        $parameter = [
            'ng_ma' => $request->ng_ma
        ];
        $result = DB::select('SELECT * FROM ngach_bac AS a, bac AS b WHERE ng_ma = :ng_ma AND a.b_ma = b.b_ma', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
}
