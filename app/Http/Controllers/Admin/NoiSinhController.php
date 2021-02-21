<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoiSinhCreateRequest;
use App\Http\Requests\NoiSinhUpdateRequest;
use App\NhanVien;
use App\NoiSinh;
use App\Tinh;
use Carbon\Carbon;
use Session;

class NoiSinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.noisinh.index')
            ->with('dsns', NoiSinh::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noisinh.create')
            ->with('dst', Tinh::all())
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoiSinhCreateRequest $request)
    {
        $ns = new NoiSinh();
        $ns->nv_ma = $request->nv_ma;
        $ns->t_ma = $request->t_ma;
        $ns->h_ma = $request->h_ma;
        $ns->x_ma = $request->x_ma;
        $ns->ns_diaChi = $request->ns_diaChi;
        $ns->ns_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $ns->ns_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $ns->save();
        Session::flash('alert', 'Đã thêm mới thành công');
        return redirect(route('admin.noisinh.create'));
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
        return view('admin.noisinh.edit')
            ->with('ns', NoiSinh::find($id))
            ->with('dst', Tinh::all())
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoiSinhUpdateRequest $request, $id)
    {
        $ns = NoiSinh::find($id);
        $ns->t_ma = $request->t_ma;
        $ns->h_ma = $request->h_ma;
        $ns->x_ma = $request->x_ma;
        $ns->ns_diaChi = $request->ns_diaChi;
        $ns->ns_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $ns->save();
        Session::flash('alert', 'Đã cập nhật thành công');
        return view('admin.noisinh.edit')
            ->with('ns', NoiSinh::find($id))
            ->with('dst', Tinh::all())
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
        $ns = NoiSinh::find($id);
        $ns->delete();
    }
}
