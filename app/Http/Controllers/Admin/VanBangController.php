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

class VanBangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $vb = new VBCC();
        $vb->nv_ma = $request->nv_ma;
        $vb->vbcc_ten = $request->vbcc_ten;
        $vb->lvbcc_ma = $request->lvbcc_ma;
        $vb->vbcc_tuNgay = $request->vbcc_tuNgay;
        $vb->vbcc_denNgay = $request->vbcc_denNgay;
        $vb->vbcc_trinhDo = $request->vbcc_trinhDo;
        $vb->vbcc_hinhThuc = $request->vbcc_hinhThuc;
        $vb->vbcc_tenTruong = $request->vbcc_tenTruong;
        $vb->vbcc_taoMoi = Carbon::now();
        $vb->vbcc_capNhat = Carbon::now();
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
        return view('admin.vanbang.edit')
            ->with('dsnv', NhanVien::all())
            ->with('dslvbcc', LoaiVBCC::all())
            ->with('vb', VBCC::find($id));
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
        $vb->nv_ma = $request->nv_ma;
        $vb->vbcc_ten = $request->vbcc_ten;
        $vb->lvbcc_ma = $request->lvbcc_ma;
        $vb->vbcc_tuNgay = $request->vbcc_tuNgay;
        $vb->vbcc_denNgay = $request->vbcc_denNgay;
        $vb->vbcc_trinhDo = $request->vbcc_trinhDo;
        $vb->vbcc_hinhThuc = $request->vbcc_hinhThuc;
        $vb->vbcc_tenTruong = $request->vbcc_tenTruong;
        $vb->vbcc_capNhat = Carbon::now();
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
        $vb->delete();
        return 'ok';
    }
}
