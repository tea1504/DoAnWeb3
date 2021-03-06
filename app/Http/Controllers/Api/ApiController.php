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
    public function laySoLuongNhanVien(Request $request)
    {
        $result = DB::select('SELECT COUNT(*) AS soluong FROM nhanvien');
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function laySoLuongNhanVienNu(Request $request)
    {
        $result = DB::select('SELECT COUNT(*) AS soluong FROM nhanvien WHERE nv_gioiTinh = 0');
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function laySoTuoiTrungBinh(Request $request)
    {
        $result = DB::select('SELECT ROUND(AVG(YEAR(now()) - YEAR(nv_ngaySinh))) AS tuoiTrungBinh FROM nhanvien');
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function laySoNamLamViecTrungBinh(Request $request)
    {
        $result = DB::select('SELECT ROUND(AVG(DATEDIFF(CURDATE(), td_ngayLam)/365)) AS soNamLamViecTB FROM tuyendung');
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layHeSoLonNhat(Request $request)
    {
        $result = DB::select('SELECT MAX(c.nb_heSoLuong) as heSoMax FROM nhanvien AS a, luong as b, ngach_bac as c WHERE a.nv_ma = b.nv_ma AND b.ng_ma = c.ng_ma AND b.b_ma = c.b_ma');
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layQuaTrinhLamViec(Request $request)
    {
        $parameter = [
            'nv_ma' => $request->nv_ma
        ];
        $result = DB::select('SELECT * FROM quatrinhcongtac AS a, chucvu AS b, donvi AS c, donviquanly AS d, ngach_bac AS e WHERE a.nv_ma = :nv_ma AND a.cvu_ma = b.cvu_ma AND a.dv_ma = c.dv_ma AND c.dvql_ma = d.dvql_ma AND a.nb_ma = e.nb_ma', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layQuaTrinhCongTac(Request $request)
    {
        if (!isset($request->nv_ma)) {
            $result = DB::select('SELECT * FROM quatrinhcongtac AS a, chucvu AS b, donvi AS c, donviquanly AS d, ngach_bac AS e, ngach AS f, bac AS g, nhanvien AS h WHERE a.cvu_ma = b.cvu_ma AND a.dv_ma = c.dv_ma AND c.dvql_ma = d.dvql_ma AND a.nb_ma = e.nb_ma AND e.ng_ma = f.ng_ma AND e.b_ma = g.b_ma AND a.nv_ma = h.nv_ma');
        } else {
            $parameter = [
                'nv_ma' => $request->nv_ma
            ];
            $result = DB::select('SELECT * FROM quatrinhcongtac AS a, chucvu AS b, donvi AS c, donviquanly AS d, ngach_bac AS e, ngach AS f, bac AS g, nhanvien AS h WHERE a.cvu_ma = b.cvu_ma AND a.dv_ma = c.dv_ma AND c.dvql_ma = d.dvql_ma AND a.nb_ma = e.nb_ma AND e.ng_ma = f.ng_ma AND e.b_ma = g.b_ma AND a.nv_ma = h.nv_ma AND a.nv_ma = :nv_ma', $parameter);
        }
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layCongViecHienTai(Request $request)
    {
        $parameter = [
            'nv_ma' => $request->nv_ma
        ];
        $result = DB::select('SELECT d.nb_heSoLuong, g.cvu_ten, f.dv_ten, e.dvql_ten FROM nhanvien AS a, luong AS b, tuyendung AS c, ngach_bac AS d, donviquanly AS e, donvi AS f, chucvu AS g WHERE a.nv_ma = :nv_ma AND a.nv_ma = b.nv_ma AND a.nv_ma = c.nv_ma AND b.ng_ma = d.ng_ma AND b.b_ma = d.b_ma AND a.cvu_ma = g.cvu_ma AND c.dv_ma = f.dv_ma AND f.dvql_ma = e.dvql_ma', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layThongTinNhanVienDayDu(Request $request)
    {
        $parameter = [
            'nv_ma' => $request->nv_ma
        ];
        $result = DB::select('SELECT * FROM nhanvien AS a, dantoc AS b, tongiao AS c, nhommau AS d, trinhdo AS e, chucvu AS f WHERE a.nv_ma = :nv_ma AND a.dt_ma = b.dt_ma AND a.tg_ma = c.tg_ma AND a.nm_ma = d.nm_ma AND a.td_ma = e.td_ma AND a.cvu_ma = f.cvu_ma', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layThongTinTuyenDung(Request $request)
    {
        $parameter = [
            'td_ma' => $request->td_ma
        ];
        $result = DB::select('SELECT * FROM tuyendung AS a, nhanvien AS b, donvi AS c, chucvu AS d, congviec AS e WHERE a.nv_ma = :nv_ma AND a.dv_ma = b.dv_ma AND a.cvu_ma = c.cvu_ma AND a.cv_ma = d.cv_ma ', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layHuyen(Request $request)
    {
        $parameter = [
            't_ma' => $request->t_ma
        ];
        $result = DB::select('SELECT * FROM huyen WHERE t_ma = :t_ma', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layXa(Request $request)
    {
        $parameter = [
            'h_ma' => $request->h_ma
        ];
        $result = DB::select('SELECT * FROM xa WHERE h_ma = :h_ma', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
    public function layQuanHeGiaDinh(Request $request)
    {
        if (isset($request->nv_ma)) {
            $parameter = [
                'nv_ma' => $request->nv_ma
            ];
            $result = DB::select('SELECT * FROM quanhegiadinh AS a, nhanvien AS b WHERE a.nv_ma = b.nv_ma AND a.nv_ma = :nv_ma', $parameter);
        }
        else{
            $result = DB::select('SELECT * FROM quanhegiadinh AS a, nhanvien AS b WHERE a.nv_ma = b.nv_ma');
        }
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }

    public function layKhenThuong(Request $request)
    {
        $parameter = [
            'nv_ma' => $request->nv_ma
        ];
        $result = DB::select('SELECT *,b.nv_hoTen AS nhanvien,c.nv_hoTen AS nguoiky FROM khenthuong AS a, nhanvien AS b, nhanvien AS c WHERE a.nv_ma = b.nv_ma and a.kt_nguoiKy=c.nv_ma', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }

    public function layKyLuat(Request $request)
    {
        $parameter = [
            'nv_ma' => $request->nv_ma
        ];
        $result = DB::select('SELECT * FROM kyluat AS a, nhanvien AS b WHERE a.nv_ma = b.nv_ma', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }

    public function layTuoiTrongKhoang(Request $request)
    {
        $parameter = [
            'tu' => $request->tu,
            'den' => $request->den,
            'tu1' => $request->tu,
            'den1' => $request->den,
        ];
        $result = DB::select('SELECT COUNT(*) as soLuong FROM nhanvien AS a WHERE YEAR(now()) - YEAR(a.nv_ngaySinh) BETWEEN :tu AND :den AND a.nv_gioiTinh = 1 UNION SELECT COUNT(*) as soLuong FROM nhanvien AS b WHERE YEAR(now()) - YEAR(b.nv_ngaySinh) BETWEEN :tu1 AND :den1 AND b.nv_gioiTinh = 0;', $parameter);
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }

    public function thongKeDanToc(Request $request)
    {
        $result = DB::select('SELECT COUNT(nv_ma) as soLuong, a.dt_ten FROM dantoc AS a LEFT JOIN nhanvien AS b ON a.dt_ma = b.dt_ma GROUP BY a.dt_ten');
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }

    public function thongKeTonGiao(Request $request)
    {
        $result = DB::select('SELECT COUNT(b.nv_ma) as soLuong, a.tg_ten FROM tongiao AS a LEFT JOIN nhanvien AS b on a.tg_ma = b.dt_ma GROUP BY a.tg_ma, a.tg_ten');
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }

    public function thongKeDonVi(Request $request)
    {
        $result = DB::select('SELECT b.dvql_ten as ten, COUNT(c.nv_ma) as soLuong FROM donvi as a RIGHT JOIN donviquanly as b on a.dvql_ma = b.dvql_ma LEFT JOIN tuyendung as c on a.dv_ma = c.dv_ma GROUP BY b.dvql_ten');
        return response()->json(array(
            'code'  => 200,
            'result' => $result,
        ));
    }
}
