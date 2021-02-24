<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tinh;
use Carbon\Carbon;
use Session;

class TinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.tinh.index')
            ->with('dst', Tinh::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.tinh.create');
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
            't_ten' => 'required|min:3|max:50',
        ]);
        $t = new Tinh();
        $t->t_ten = $request->t_ten;
        $t->t_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $t->t_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $t->save();
        Session::flash('alert', 'Đã tạo thành công tỉnh ' . $request->t_ten);
        return redirect(route('admin.tinh.create'));
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
        return view('admin.quanlychung.tinh.edit')
            ->with('t', Tinh::find($id));
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
            't_ten' => 'required|min:3|max:50',
        ]);
        $t = Tinh::find($id);
        $t->t_ten = $request->t_ten;
        $t->t_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $t->t_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $t->save();
        Session::flash('alert', 'Đã cập nhật thành công tỉnh ' . $request->t_ten);
        return view('admin.quanlychung.tinh.edit')
            ->with('t', Tinh::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Tinh::find($id);
        $t->delete();
    }
}
