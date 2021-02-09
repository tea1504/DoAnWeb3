<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VanBangCreateRequest;
use Carbon\Carbon;
use Session;
use App\VBCC;
use App\NhanVien;
use App\LoaiVBCC;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\VanBangExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Policies\VanBangPolicy;

class VanBangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', VBCC::class);
        $result = NhanVien::all();
        return view('admin.vanbang.index')
            ->with('dsnv', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function create_id($id = null)
    {
        $this->authorize('create', VBCC::class);
        return view('admin.vanbang.create')
            ->with('dsnv', NhanVien::all())
            ->with('dslvbcc', LoaiVBCC::all())
            ->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VanBangCreateRequest $request)
    {
        // dd($request->all());
        $this->authorize('create', VBCC::class);
        $vb = new VBCC();
        $vb->nv_ma = $request->nv_ma;
        $vb->vbcc_ten = $request->vbcc_ten;
        $vb->lvbcc_ma = $request->lvbcc_ma;
        $vb->vbcc_tuNgay = $request->vbcc_tuNgay;
        $vb->vbcc_denNgay = $request->vbcc_denNgay;
        $vb->vbcc_trinhDo = $request->vbcc_trinhDo;
        $vb->vbcc_hinhThuc = $request->vbcc_hinhThuc;
        $vb->vbcc_tenTruong = $request->vbcc_tenTruong;
        $vb->vbcc_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $vb->vbcc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $vb->save();
        Session::flash('alert', 'Đã thêm mới thành công văn bằng cho nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return redirect(route('admin.vanbang.create_id'));
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
        $vb = VBCC::find($id);
        $this->authorize('update', $vb);
        return view('admin.vanbang.edit')
            ->with('dsnv', NhanVien::all())
            ->with('dslvbcc', LoaiVBCC::all())
            ->with('vb', $vb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VanBangCreateRequest $request, $id)
    {
        $vb = VBCC::find($id);
        $this->authorize('update', $vb);
        $vb->nv_ma = $request->nv_ma;
        $vb->vbcc_ten = $request->vbcc_ten;
        $vb->lvbcc_ma = $request->lvbcc_ma;
        $vb->vbcc_tuNgay = $request->vbcc_tuNgay;
        $vb->vbcc_denNgay = $request->vbcc_denNgay;
        $vb->vbcc_trinhDo = $request->vbcc_trinhDo;
        $vb->vbcc_hinhThuc = $request->vbcc_hinhThuc;
        $vb->vbcc_tenTruong = $request->vbcc_tenTruong;
        $vb->vbcc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $vb->save();
        Session::flash('alert', 'Đã cập nhật thành công văn bằng cho nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return view('admin.vanbang.edit')
            ->with('dsnv', NhanVien::all())
            ->with('dslvbcc', LoaiVBCC::all())
            ->with('vb', $vb);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vb = VBCC::find($id);
        $this->authorize('delete', $vb);
        $vb->delete();
        return 'ok';
    }
    public function print($id = null)
    {
        $this->authorize('inAn', VBCC::class);
        return view('admin.vanbang.print')
            ->with('dsvbcc', VBCC::all())
            ->with('id', $id);
    }
    public function pdf($id = null)
    {
        $this->authorize('inAn', VBCC::class);
        $result = VBCC::all();
        $data = [
            'dsvbcc' => $result,
            'id' => $id,
        ];
        // return view('admin.vanbang.pdf')->with("dsvbcc", $result);
        $pdf = PDF::loadView('admin.vanbang.pdf', $data);
        return $pdf->download('DanhSachVanBang.pdf');
    }
    public function excel()
    {
        $this->authorize('inAn', VBCC::class);
        // return view('admin.vanbang.excel')->with("dsvbcc", VBCC::all());
        return Excel::download(new VanBangExport, 'DanhSachVanBang.xlsx');
    }
}
