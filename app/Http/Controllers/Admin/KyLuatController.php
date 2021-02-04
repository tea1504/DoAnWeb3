<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KyLuat;
use App\NhanVien;

class KyLuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kl = KyLuat::all();
        return view('admin.kyluat.index')
        ->with('kl',$kl);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nv = NhanVien::all();
        return view('admin.kyluat.create')
        ->with('nv',$nv);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kl = new KyLuat();
        $kl->nv_ma = $request->nv_ma;
        $kl->kl_ngayKy = $request->kl_ngayKy;
        $kl->kl_nguoiKy = $request->nv_ma;
        $kl->kl_lyDo = $request->kl_lyDo;
        $kl->kl_taoMoi = $request->kl_taoMoi;
        $kl->kl_capNhat = $request->kl_capNhat;

        $kl->save();
        return redirect()->route('admin.kyluat.index');
        dd($kl->kl_ngayKy);
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
        $kl = KyLuat::where("kl_ma",$id)->first();
        $nv = NhanVien::all();
        return view('admin.kyluat.edit')
        ->with('kl',$kl)
        ->with('nv',$nv);
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
        $kl = KyLuat::where("kl_ma", $id)->first();
        $kl->nv_ma = $request->nv_ma;
        $kl->kl_ngayKy = $request->kl_ngayKy;
        $kl->kl_nguoiKy = $request->nv_ma;
        $kl->kl_lyDo = $request->kl_lyDo;
        $kl->kl_taoMoi = $request->kl_taoMoi;
        $kl->kl_capNhat = $request->kl_capNhat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
