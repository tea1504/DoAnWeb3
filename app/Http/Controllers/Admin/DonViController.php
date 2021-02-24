<?php

namespace App\Http\Controllers\Admin;

use App\DonVi;
use App\DonViQuanLy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;

class DonViController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.donvi.index')
            ->with('dsdv', DonVi::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.donvi.create')
            ->with('dsdvql', DonViQuanLy::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dv_ten' => 'required|min:3|max:50',
            'dvql_ma' => 'required',
        ]);
        $dv = new DonVi();
        $dv->dv_ten = $request->dv_ten;
        $dv->dvql_ma = $request->dvql_ma;
        $dv->dv_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $dv->dv_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $dv->save();
        Session::flash('alert', 'Đã tạo thành công đơn vị ' . $request->dv_ten);
        return redirect(route('admin.donvi.create'));
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
        return view('admin.quanlychung.donvi.edit')
            ->with('dv', DonVi::find($id))
            ->with('dsdvql', DonViQuanLy::all());
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
            'dv_ten' => 'required|min:3|max:50',
            'dvql_ma' => 'required',
        ]);
        $dv = DonVi::find($id);
        $dv->dv_ten = $request->dv_ten;
        $dv->dvql_ma = $request->dvql_ma;
        $dv->dv_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $dv->save();
        Session::flash('alert', 'Đã cập nhật thành công đơn vị ' . $request->dv_ten);
        return view('admin.quanlychung.donvi.edit')
            ->with('dv', DonVi::find($id))
            ->with('dsdvql', DonViQuanLy::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dv = DonVi::find($id);
        $dv->delete();
    }
}
