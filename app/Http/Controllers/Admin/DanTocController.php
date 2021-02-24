<?php

namespace App\Http\Controllers\Admin;

use App\DanToc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;

class DanTocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.dantoc.index')
            ->with('dsdt', DanToc::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.dantoc.create');
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
            'dt_ten' => 'required|min:3|max:50',
        ]);
        $dt = new DanToc();
        $dt->dt_ten = $request->dt_ten;
        $dt->dt_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $dt->dt_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $dt->save();
        Session::flash('alert', 'Đã tạo thành công dân tộc ' . $request->dt_ten);
        return redirect(route('admin.dantoc.create'));
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
        return view('admin.quanlychung.dantoc.edit')
            ->with('dt', DanToc::find($id));
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
            'dt_ten' => 'required|min:3|max:50',
        ]);
        $dt = DanToc::find($id);
        $dt->dt_ten = $request->dt_ten;
        $dt->dt_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $dt->save();
        Session::flash('alert', 'Đã cập nhật thành công dân tộc ' . $request->dt_ten);
        return view('admin.quanlychung.dantoc.edit')
            ->with('dt', DanToc::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dt = DanToc::find($id);
        $dt->delete();
    }
}
