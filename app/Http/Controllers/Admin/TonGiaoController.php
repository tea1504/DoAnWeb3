<?php

namespace App\Http\Controllers\Admin;

use App\TonGiao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;

class TonGiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.tongiao.index')
            ->with('dstg', TonGiao::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.tongiao.create');
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
            'tg_ten' => 'required|min:3|max:50',
        ]);
        $tg = new TonGiao();
        $tg->tg_ten = $request->tg_ten;
        $tg->tg_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $tg->tg_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $tg->save();
        Session::flash('alert', 'Đã tạo thành công tôn giáo ' . $request->tg_ten);
        return redirect(route('admin.tongiao.create'));
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
        return view('admin.quanlychung.tongiao.edit')
            ->with('tg', TonGiao::find($id));
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
            'tg_ten' => 'required|min:3|max:50',
        ]);
        $tg = TonGiao::find($id);
        $tg->tg_ten = $request->tg_ten;
        $tg->tg_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $tg->save();
        Session::flash('alert', 'Đã cập nhật thành công tôn giáo ' . $request->tg_ten);
        return view('admin.quanlychung.tongiao.edit')
            ->with('tg', TonGiao::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tg = TonGiao::find($id);
        $tg->delete();
    }
}
