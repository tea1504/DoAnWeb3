<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LichSuBanThan;
use App\NhanVien;
use Session;
use Carbon\Carbon;

class LichSuBanThanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', LichSuBanThan::class);
        return view('admin.lichsubanthan.index')
            ->with('dslsbt', LichSuBanThan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', LichSuBanThan::class);
        return view('admin.lichsubanthan.create')
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', LichSuBanThan::class);
        $this->validate($request, [
            'nv_ma' => 'required|unique:lichsubanthan',
            'lsbt_hanhViPhamToi' => 'required',
            'lsbt_thamGiaToChucChinhTri' => 'required',
        ]);
        $lsbt = new LichSuBanThan();
        $lsbt->nv_ma = $request->nv_ma;
        $lsbt->lsbt_hanhViPhamToi = $request->lsbt_hanhViPhamToi;
        $lsbt->lsbt_thamGiaToChucChinhTri = $request->lsbt_thamGiaToChucChinhTri;
        $lsbt->lsbt_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $lsbt->lsbt_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $lsbt->save();
        Session::flash('alert', 'Đã tạo thành công dữ liệu lịch sử bản thân của nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return redirect(route('admin.lichsubanthan.create'));
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
        $this->authorize('update', LichSuBanThan::find($id));
        return view('admin.lichsubanthan.edit')
            ->with('lsbt', LichSuBanThan::find($id))
            ->with('dsnv', NhanVien::all());
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
        $this->validate($request, [
            'lsbt_hanhViPhamToi' => 'required',
            'lsbt_thamGiaToChucChinhTri' => 'required',
        ]);
        $lsbt = LichSuBanThan::find($id);
        $this->authorize('update', $lsbt);
        $lsbt->lsbt_hanhViPhamToi = $request->lsbt_hanhViPhamToi;
        $lsbt->lsbt_thamGiaToChucChinhTri = $request->lsbt_thamGiaToChucChinhTri;
        $lsbt->lsbt_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $lsbt->save();
        Session::flash('alert', 'Đã cập nhật thành công dữ liệu lịch sử bản thân của nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return view('admin.lichsubanthan.edit')
            ->with('lsbt', LichSuBanThan::find($id))
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lsbt = LichSuBanThan::find($id);
        $this->authorize('delete', $lsbt);
        $lsbt->delete();
    }
}
