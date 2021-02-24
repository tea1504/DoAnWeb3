<?php

namespace App\Http\Controllers\Admin;

use App\CongViec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;

class CongViecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.congviec.index')
            ->with('dscv', CongViec::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.congviec.create');
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
            'cv_ten' => 'required|min:3|max:50',
        ]);
        $cv = new CongViec();
        $cv->cv_ten = $request->cv_ten;
        $cv->cv_moTa = $request->cv_moTa;
        $cv->cv_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $cv->cv_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $cv->save();
        Session::flash('alert', 'Đã tạo thành công công việc ' . $request->cv_ten);
        return redirect(route('admin.congviec.create'));
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
        return view('admin.quanlychung.congviec.edit')
            ->with('cv', CongViec::find($id));
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
            'cv_ten' => 'required|min:3|max:50',
        ]);
        $cv = CongViec::find($id);
        $cv->cv_ten = $request->cv_ten;
        $cv->cv_moTa = $request->cv_moTa;
        $cv->cv_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $cv->save();
        Session::flash('alert', 'Đã cập nhật thành công công việc ' . $request->cv_ten);
        return view('admin.quanlychung.congviec.edit')
            ->with('cv', CongViec::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv = CongViec::find($id);
        $cv->delete();
    }
}
