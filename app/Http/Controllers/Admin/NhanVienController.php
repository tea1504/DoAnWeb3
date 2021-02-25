<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhanVien;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\NhanVienExport;
use App\LichSuBanThan;
use App\Luong;
use App\NoiSinh;
use App\QueQuan;
use App\TuyenDung;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Session;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', NhanVien::class);
        $data = NhanVien::all();
        return view('admin.nhanvien.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('update', NhanVien::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('update', NhanVien::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', NhanVien::class);
        $result = NhanVien::find($id);
        if (Luong::where('nv_ma', $id)->first() == null) {
            Session::flash('alert-error', 'Tài khoản chưa đủ thông tin cần cập nhật thông tin về LƯƠNG');
            return redirect()->back();
        }
        if (TuyenDung::where('nv_ma', $id)->first() == null) {
            Session::flash('alert-error', 'Tài khoản chưa đủ thông tin cần cập nhật thông tin về TUYỂN DỤNG');
            return redirect()->back();
        }
        if (QueQuan::where('nv_ma', $id)->first() == null) {
            Session::flash('alert-error', 'Tài khoản chưa đủ thông tin cần cập nhật thông tin về QUÊ QUÁN');
            return redirect()->back();
        }
        if (NoiSinh::where('nv_ma', $id)->first() == null) {
            Session::flash('alert-error', 'Tài khoản chưa đủ thông tin cần cập nhật thông tin về NƠI SINH');
            return redirect()->back();
        }
        if (LichSuBanThan::where('nv_ma', $id)->first() == null) {
            Session::flash('alert-error', 'Tài khoản chưa đủ thông tin cần cập nhật thông tin về LỊCH SỬ BẢN THÂN');
            return redirect()->back();
        }
        return view('admin.nhanvien.show')
            ->with('nv', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function printDetail($id)
    {
        $this->authorize('inAn', NhanVien::class);
        $result = NhanVien::find($id);
        return view('admin.nhanvien.print-chitiet')
            ->with('nv', $result);
    }
    public function pdfDetail($id)
    {
        $this->authorize('inAn', NhanVien::class);
        $result = NhanVien::find($id);
        $data = [
            'nv' => $result,
        ];
        $pdf = PDF::loadView('admin.nhanvien.pdf-chitiet', $data);
        return $pdf->download('CanBo' . $result->nv_ma . '.pdf');
    }
    public function print()
    {
        $this->authorize('inAn', NhanVien::class);
        $result = NhanVien::all();
        return view('admin.nhanvien.print')
            ->with('dsnv', $result);
    }
    public function pdf()
    {
        $result = NhanVien::all();
        $data = [
            'dsnv' => $result,
        ];
        // return view('admin.nhanvien.pdf')->with("dsnv", $result);
        $pdf = PDF::loadView('admin.nhanvien.pdf', $data);
        return $pdf->download('DanhSachCanBo.pdf');
    }
    public function excel()
    {
        // return view('admin.nhanvien.excel')->with("dsnv", NhanVien::all());
        return Excel::download(new NhanVienExport, 'DanhSachCanBo.xlsx');
    }
}
