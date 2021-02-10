<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LuongCreateRequest;
use App\Http\Requests\LuongUpdateRequest;
use Session;
use Carbon\Carbon;
use App\Luong;
use App\Ngach;
use App\NhanVien;
use App\PhuCap;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Exports\LuongExport;

class LuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Luong::class);
        return view('admin.luong.index')
            ->with('dsl', Luong::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Luong::class);
        return view('admin.luong.create')
            ->with('dsn', Ngach::all())
            ->with('dspc', PhuCap::all())
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LuongCreateRequest $request)
    {
        $this->authorize('create', Luong::class);
        $l = new Luong();
        $l->nv_ma = $request->nv_ma;
        $l->ng_ma = $request->ng_ma;
        $l->b_ma = $request->b_ma;
        $l->pc_ma = $request->pc_ma;
        $l->l_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $l->l_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $l->save();
        Session::flash('alert', 'Đã tạo thành công dữ liệu lương của nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return redirect(route('admin.luong.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Luong::find($id));
        return view('admin.luong.edit')
            ->with('l', Luong::find($id))
            ->with('dsn', Ngach::all())
            ->with('dspc', PhuCap::all())
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LuongUpdateRequest $request, $id)
    {
        $this->authorize('update', Luong::find($id));
        $l = Luong::find($id);
        $l->ng_ma = $request->ng_ma;
        $l->b_ma = $request->b_ma;
        $l->pc_ma = $request->pc_ma;
        $l->l_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $l->save();
        Session::flash('alert', 'Đã cập nhật thành công dữ liệu lương của nhân viên');
        return view('admin.luong.edit')
            ->with('l', Luong::find($id))
            ->with('dsn', Ngach::all())
            ->with('dspc', PhuCap::all())
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
        $l = Luong::find($id);
        $this->authorize('delete', $l);
        $l->delete();
        Session::flash('alert', 'Đã xóa dữ liệu thành công');
        return redirect(route('admin.luong.index'));
    }

    public function print()
    {
        $this->authorize('inAn', Luong::class);
        return view('admin.luong.print')
            ->with('dsl', Luong::all());
    }

    public function pdf()
    {
        $this->authorize('inAn', Luong::class);
        $result = Luong::all();
        $data = [
            'dsl' => $result,
        ];
        $pdf = PDF::loadView('admin.luong.pdf', $data);
        return $pdf->download('DanhSachLuong.pdf');
    }

    public function excel()
    {
        $this->authorize('inAn', Luong::class);
        // return view('admin.luong.excel')->with("dsl", Luong::all());
        return Excel::download(new LuongExport, 'DanhSachLuong.xlsx');
    }
}
