<?php

namespace App\Http\Controllers\Admin;

use App\ChucVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.chucvu.index')
            ->with('dscvu', ChucVu::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.chucvu.create');
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
            'cvu_ten' => 'required|min:3|max:50',
        ]);
        $cvu = new ChucVu();
        $cvu->cvu_ten = $request->cvu_ten;
        $cvu->cvu_moTa = $request->cvu_moTa;
        $cvu->cvu_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $cvu->cvu_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $cvu->save();
        Session::flash('alert', 'Đã tạo thành công chức vụ ' . $request->cvu_ten);
        return redirect(route('admin.chucvu.create'));
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
        return view('admin.quanlychung.chucvu.edit')
            ->with('cvu', ChucVu::find($id));
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
            'cvu_ten' => 'required|min:3|max:50',
        ]);
        $cvu = ChucVu::find($id);
        $cvu->cvu_ten = $request->cvu_ten;
        $cvu->cvu_moTa = $request->cvu_moTa;
        $cvu->cvu_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $cvu->save();
        Session::flash('alert', 'Đã cập nhật thành công chức vụ ' . $request->cvu_ten);
        return view('admin.quanlychung.chucvu.edit')
            ->with('cvu', ChucVu::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cvu = ChucVu::find($id);
        $cvu->delete();
    }
}
