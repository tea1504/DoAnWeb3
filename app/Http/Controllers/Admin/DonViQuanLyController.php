<?php

namespace App\Http\Controllers\Admin;

use App\DonViQuanLy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;

class DonViQuanLyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.donviquanly.index')
            ->with('dsdvql', DonViQuanLy::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.donviquanly.create');
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
            'dvql_ten' => 'required|min:3|max:50',
        ]);
        $dvql = new DonViQuanLy();
        $dvql->dvql_ten = $request->dvql_ten;
        $dvql->dvql_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $dvql->dvql_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $dvql->save();
        Session::flash('alert', 'Đã tạo thành công đơn vị quản lý ' . $request->dvql_ten);
        return redirect(route('admin.donviquanly.create'));
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
        return view('admin.quanlychung.donviquanly.edit')
            ->with('dvql', DonViQuanLy::find($id));
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
            'dvql_ten' => 'required|min:3|max:50',
        ]);
        $dvql = DonViQuanLy::find($id);
        $dvql->dvql_ten = $request->dvql_ten;
        $dvql->dvql_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $dvql->dvql_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $dvql->save();
        Session::flash('alert', 'Đã cập nhật thành công đơn vị quản lý ' . $request->dvql_ten);
        return view('admin.quanlychung.donviquanly.edit')
            ->with('dvql', DonViQuanLy::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dvql = DonViQuanLy::find($id);
        $dvql->delete();
    }
}
