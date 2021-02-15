<?php

namespace App\Http\Controllers\Admin;

use App\Bac;
use App\ChucVu;
use App\DonVi;
use App\Exports\QuaTrinhCongTacExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuaTrinhCongTacRequest;
use App\Ngach;
use App\NhanVien;
use App\QuaTrinhCongTac;
use DB;
use Carbon\Carbon;
use Session;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;

class QuaTrinhCongTacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quatrinhcongtac.index')
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function create_id($id = null)
    {
        $this->authorize('create', QuaTrinhCongTac::class);
        return view('admin.quatrinhcongtac.create')
            ->with('dscvu', ChucVu::all())
            ->with('dsdv', DonVi::all())
            ->with('dsng', Ngach::all())
            ->with('dsb', Bac::all())
            ->with('dsnv', NhanVien::all())
            ->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuaTrinhCongTacRequest $request)
    {
        $this->authorize('create', QuaTrinhCongTac::class);
        $parameter = [
            'ng_ma' => $request->ng_ma,
            'b_ma' => $request->b_ma,
        ];
        $qtct = new QuaTrinhCongTac();
        $qtct->nv_ma = $request->nv_ma;
        $qtct->qtct_tuNgay = $request->qtct_tuNgay;
        $qtct->qtct_denNgay = $request->qtct_denNgay;
        $qtct->cvu_ma = $request->cvu_ma;
        $qtct->dv_ma = $request->dv_ma;
        $qtct->nb_ma = DB::select('SELECT nb_ma FROM ngach_bac WHERE ng_ma = :ng_ma AND b_ma = :b_ma', $parameter)[0]->nb_ma;
        $qtct->qtct_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $qtct->qtct_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $qtct->save();
        Session::flash('alert', 'Đã tạo thành công dữ liệu lương của nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return view('admin.quatrinhcongtac.create')
            ->with('dscvu', ChucVu::all())
            ->with('dsdv', DonVi::all())
            ->with('dsng', Ngach::all())
            ->with('dsb', Bac::all())
            ->with('dsnv', NhanVien::all())
            ->with('id', $request->nv_ma);
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
        $this->authorize('create', QuaTrinhCongTac::find($id));
        return view('admin.quatrinhcongtac.edit')
            ->with('dscvu', ChucVu::all())
            ->with('dsdv', DonVi::all())
            ->with('dsng', Ngach::all())
            ->with('dsb', Bac::all())
            ->with('dsnv', NhanVien::all())
            ->with('qt', QuaTrinhCongTac::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuaTrinhCongTacRequest $request, $id)
    {
        $parameter = [
            'ng_ma' => $request->ng_ma,
            'b_ma' => $request->b_ma,
        ];
        $qtct = QuaTrinhCongTac::find($id);
        $this->authorize('create', $qtct);
        $qtct->nv_ma = $request->nv_ma;
        $qtct->qtct_tuNgay = $request->qtct_tuNgay;
        $qtct->qtct_denNgay = $request->qtct_denNgay;
        $qtct->cvu_ma = $request->cvu_ma;
        $qtct->dv_ma = $request->dv_ma;
        $qtct->nb_ma = DB::select('SELECT nb_ma FROM ngach_bac WHERE ng_ma = :ng_ma AND b_ma = :b_ma', $parameter)[0]->nb_ma;
        $qtct->qtct_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $qtct->save();
        Session::flash('alert', 'Đã cập nhật thành công dữ liệu lương của nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return view('admin.quatrinhcongtac.edit')
            ->with('dscvu', ChucVu::all())
            ->with('dsdv', DonVi::all())
            ->with('dsng', Ngach::all())
            ->with('dsb', Bac::all())
            ->with('dsnv', NhanVien::all())
            ->with('qt', QuaTrinhCongTac::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qtct = QuaTrinhCongTac::find($id);
        $this->authorize('delete', $qtct);
        $qtct->delete();
    }
    public function print($id = null)
    {
        $this->authorize('inAn', QuaTrinhCongTac::class);
        return view('admin.quatrinhcongtac.print')
            ->with('dsqtct', QuaTrinhCongTac::all())
            ->with('id', $id);
    }
    public function pdf($id = null)
    {
        $this->authorize('inAn', QuaTrinhCongTac::class);
        $result = QuaTrinhCongTac::all();
        $data = [
            'dsqtct' => $result,
            'id' => $id,
        ];
        // return view('admin.quatrinhcongtac.pdf')->with("dsqtct", $result);
        $pdf = PDF::loadView('admin.quatrinhcongtac.pdf', $data);
        return $pdf->download('DanhSachQuaTrinhCongTac.pdf');
    }
    public function excel()
    {
        $this->authorize('inAn', QuaTrinhCongTac::class);
        // return view('admin.quatrinhcongtac.excel')->with("dsqtct", QuaTrinhCongTac::all());
        return Excel::download(new QuaTrinhCongTacExport, 'DanhSachQuaTrinhCongTac.xlsx');
    }
}
