<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhuCap;
use Carbon\Carbon;
use Session;

class PhuCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.phucap.index')
            ->with('dspc', PhuCap::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.phucap.create');
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
            'pc_ten' => 'required|min:3|max:50',
            'pc_heSoPhuCap' => 'required',
        ]);
        $pc = new PhuCap();
        $pc->pc_ten = $request->pc_ten;
        $pc->pc_heSoPhuCap = $request->pc_heSoPhuCap;
        $pc->pc_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $pc->pc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $pc->save();
        Session::flash('alert', 'Đã tạo thành công phụ cấp ' . $request->pc_ten);
        return redirect(route('admin.phucap.create'));
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
        return view('admin.quanlychung.phucap.edit')
            ->with('pc', PhuCap::find($id));    
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
            'pc_ten' => 'required|min:3|max:50',
            'pc_heSoPhuCap' => 'required',
        ]);
        $pc = PhuCap::find($id);
        $pc->pc_ten = $request->pc_ten;
        $pc->pc_heSoPhuCap = $request->pc_heSoPhuCap;
        $pc->pc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $pc->save();
        Session::flash('alert', 'Đã cập nhật thành công phụ cấp ' . $request->pc_ten);
        return view('admin.quanlychung.phucap.edit')
            ->with('pc', PhuCap::find($id)); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pc = PhuCap::find($id);
        $pc->delete();
    }
}
