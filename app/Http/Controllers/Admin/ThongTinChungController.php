<?php

namespace App\Http\Controllers\Admin;

use App\ChucVu;
use App\DanToc;
use App\Exports\ThongTinChungExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThongTinChungCreateRequest;
use App\Http\Requests\ThongTinChungUpdateRequest;
use App\NhanVien;
use App\NhomMau;
use App\Role;
use App\TonGiao;
use App\TrinhDo;
use App\User;
use Carbon\Carbon;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;

class ThongTinChungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', User::class);
        return view('admin.thongtinchung.index')
            ->with('dsttc', NhanVien::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('view', User::class);
        return view('admin.thongtinchung.create')
            ->with('dsrole', Role::all())
            ->with('dscvu', ChucVu::all())
            ->with('dstd', TrinhDo::all())
            ->with('dsnm', NhomMau::all())
            ->with('dstg', TonGiao::all())
            ->with('dsdt', DanToc::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThongTinChungCreateRequest $request)
    {
        $this->authorize('create', User::class);
        $ttc = new NhanVien();
        $ttc->nv_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $ttc->nv_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $ttc->nv_ma = $request->nv_ma;
        $ttc->nv_hoTen = $request->nv_hoTen;
        $ttc->nv_tenGoiKhac = $request->nv_tenGoiKhac;
        $ttc->nv_trinhDoChuyenMon = $request->nv_trinhDoChuyenMon;
        $ttc->nv_ngaySinh = $request->nv_ngaySinh;
        $ttc->dt_ma = $request->dt_ma;
        $ttc->tg_ma = $request->tg_ma;
        $ttc->nv_hoKhauThuongTru = $request->nv_hoKhauThuongTru;
        $ttc->nv_noiOHienNay = $request->nv_noiOHienNay;
        $ttc->nv_ngayVaoDang = $request->nv_ngayVaoDang;
        $ttc->nv_ngayVaoDangChinhThuc = $request->nv_ngayVaoDangChinhThuc;
        $ttc->nv_ngayNhapNgu = $request->nv_ngayNhapNgu;
        $ttc->nv_ngayXuatNgu = $request->nv_ngayXuatNgu;
        $ttc->nv_quanHam = $request->nv_quanHam;
        $ttc->nv_sucKhoe = $request->nv_sucKhoe;
        $ttc->nv_chieuCao = $request->nv_chieuCao;
        $ttc->nv_canNang = $request->nv_canNang;
        $ttc->nm_ma = $request->nm_ma;
        $ttc->nv_hangThuongBinh = $request->nv_hangThuongBinh;
        $ttc->nv_giaDinhChinhSach = $request->nv_giaDinhChinhSach;
        $ttc->nv_cmnd = $request->nv_cmnd;
        $ttc->nv_cmndNgayCap = $request->nv_cmndNgayCap;
        $ttc->nv_bhxh = $request->nv_bhxh;
        $ttc->td_ma = $request->td_ma;
        $ttc->username = $request->username;
        $ttc->password = $request->password;
        $ttc->nv_sdt = $request->nv_sdt;
        $ttc->nv_email = $request->nv_email;
        $ttc->role_ma = $request->role_ma;
        $ttc->cvu_ma = $request->cvu_ma;
        $ttc->nv_gioiTinh = $request->nv_gioiTinh;
        if ($request->hasFile('nv_anh')) {
            $file = $request->nv_anh;
            $ttc->nv_anh = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('public/avatar', $ttc->nv_anh);
        }
        $ttc->save();
        Session::flash('alert', 'Đã thêm mới thành công');
        return redirect(route('admin.thongtinchung.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', User::class);
        return view('admin.thongtinchung.edit')
            ->with('ttc', NhanVien::find($id))
            ->with('dsrole', Role::all())
            ->with('dscvu', ChucVu::all())
            ->with('dstd', TrinhDo::all())
            ->with('dsnm', NhomMau::all())
            ->with('dstg', TonGiao::all())
            ->with('dsdt', DanToc::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThongTinChungUpdateRequest $request, $id)
    {
        $this->authorize('update', User::class);
        $ttc = NhanVien::find($id);
        $ttc->nv_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $ttc->nv_hoTen = $request->nv_hoTen;
        $ttc->nv_tenGoiKhac = $request->nv_tenGoiKhac;
        $ttc->nv_trinhDoChuyenMon = $request->nv_trinhDoChuyenMon;
        $ttc->nv_ngaySinh = $request->nv_ngaySinh;
        $ttc->dt_ma = $request->dt_ma;
        $ttc->tg_ma = $request->tg_ma;
        $ttc->nv_hoKhauThuongTru = $request->nv_hoKhauThuongTru;
        $ttc->nv_noiOHienNay = $request->nv_noiOHienNay;
        $ttc->nv_ngayVaoDang = $request->nv_ngayVaoDang;
        $ttc->nv_ngayVaoDangChinhThuc = $request->nv_ngayVaoDangChinhThuc;
        $ttc->nv_ngayNhapNgu = $request->nv_ngayNhapNgu;
        $ttc->nv_ngayXuatNgu = $request->nv_ngayXuatNgu;
        $ttc->nv_quanHam = $request->nv_quanHam;
        $ttc->nv_sucKhoe = $request->nv_sucKhoe;
        $ttc->nv_chieuCao = $request->nv_chieuCao;
        $ttc->nv_canNang = $request->nv_canNang;
        $ttc->nm_ma = $request->nm_ma;
        $ttc->nv_hangThuongBinh = $request->nv_hangThuongBinh;
        $ttc->nv_giaDinhChinhSach = $request->nv_giaDinhChinhSach;
        $ttc->nv_cmnd = $request->nv_cmnd;
        $ttc->nv_cmndNgayCap = $request->nv_cmndNgayCap;
        $ttc->nv_bhxh = $request->nv_bhxh;
        $ttc->td_ma = $request->td_ma;
        $ttc->nv_sdt = $request->nv_sdt;
        $ttc->nv_email = $request->nv_email;
        $ttc->role_ma = $request->role_ma;
        $ttc->cvu_ma = $request->cvu_ma;
        $ttc->nv_gioiTinh = $request->nv_gioiTinh;
        if ($request->hasFile('nv_anh')) {
            Storage::delete('public/avatar/' . $ttc->nv_anh);
            $file = $request->nv_anh;
            $ttc->nv_anh = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('public/avatar', $ttc->nv_anh);
        }
        $ttc->save();
        Session::flash('alert', 'Đã cập nhật thành công thông tin chung của nhân viên ' . $request->nv_hoTen);
        return view('admin.thongtinchung.edit')
            ->with('ttc', $ttc)
            ->with('dsrole', Role::all())
            ->with('dscvu', ChucVu::all())
            ->with('dstd', TrinhDo::all())
            ->with('dsnm', NhomMau::all())
            ->with('dstg', TonGiao::all())
            ->with('dsdt', DanToc::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        $ttc = NhanVien::find($id);
        $ttc->delete();
    }

    public function print()
    {
        $this->authorize('inAn', User::class);
        return view('admin.thongtinchung.print')
            ->with('dsttc', NhanVien::all());
    }
    public function pdf()
    {
        $this->authorize('inAn', User::class);
        $result = NhanVien::all();
        $data = [
            'dsttc' => $result,
        ];
        // return view('admin.vanbang.pdf')->with("dsvbcc", $result);
        $pdf = PDF::loadView('admin.thongtinchung.pdf', $data);
        return $pdf->download('DanhSachThongTinChung.pdf');
    }
    public function excel()
    {
        $this->authorize('inAn', User::class);
        // return view('admin.thongtinchung.excel')
        //     ->with('dsttc', NhanVien::all());
        return Excel::download(new ThongTinChungExport, 'DanhSachThongTinChung.xlsx');
    }
}