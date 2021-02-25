<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoaiVBCC;
use Carbon\Carbon;
use Session;

class LoaiVBCCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.loaivbcc.index')
            ->with('dslvbcc', LoaiVBCC::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.loaivbcc.create');
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
            'lvbcc_ten' => 'required|min:3|max:100',
        ]);
        $lvbcc = new LoaiVBCC();
        $lvbcc->lvbcc_ten = $request->lvbcc_ten;
        $lvbcc->lvbcc_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $lvbcc->lvbcc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $lvbcc->save();
        Session::flash('alert', 'Đã tạo thành công loại văn bằng chứng chỉ ' . $request->lvbcc_ten);
        return redirect(route('admin.loaivbcc.create'));
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
        return view('admin.quanlychung.loaivbcc.edit')
            ->with('lvbcc', LoaiVBCC::find($id));
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
            'lvbcc_ten' => 'required|min:3|max:100',
        ]);
        $lvbcc = LoaiVBCC::find($id);
        $lvbcc->lvbcc_ten = $request->lvbcc_ten;
        $lvbcc->lvbcc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $lvbcc->save();
        Session::flash('alert', 'Đã cập nhật thành công loại văn bằng chứng chỉ ' . $request->lvbcc_ten);
        return view('admin.quanlychung.loaivbcc.edit')
            ->with('lvbcc', LoaiVBCC::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lvbcc = LoaiVBCC::find($id);
        $lvbcc->delete();
    }
}
