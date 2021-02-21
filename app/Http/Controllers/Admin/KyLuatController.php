<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KyLuat;
use App\NhanVien;
use Carbon\Carbon;
use App\Http\Requests\KyLuatCreateRequest;
class KyLuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_kl = KyLuat::all();
        return view('admin.kyluat.index')
        ->with('danhsachkyluat',$ds_kl);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mytime = Carbon::now();
        $nv = NhanVien::all();
        return view('admin.kyluat.create')
        ->with('danhsachnhanvien',$nv)
        ->with('mytime',$mytime);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KyLuatCreateRequest $request)
    {
        $kl = new KyLuat();
        $kl->nv_ma = $request->nv_ma;
        $kl->kl_ngayKy = $request->kl_ngayKy;
        $kl->kl_nguoiKy = $request->nv_ma;
        $kl->kl_lyDo = $request->kl_lyDo;
        $kl->kl_taoMoi = Carbon::now();
        $kl->kl_capNhat = Carbon::now();

        $kl->save();
        return redirect()->route('admin.kyluat.index');
        dd($kl);
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
        $ds_kl = KyLuat::find($id);
        $ds_nv = NhanVien::all();
        $mytime =  Carbon::now();
        return view('admin.kyluat.edit')
        ->with('kl',$ds_kl)
        ->with('danhsachnhanvien',$ds_nv)
        ->with('mytime',$mytime);
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
        $kl = KyLuat::find($id);
        $kl->nv_ma = $request->nv_ma;
        $kl->kl_ngayKy = $request->kl_ngayKy;
        $kl->kl_nguoiKy = $request->nv_ma;
        $kl->kl_lyDo = $request->kl_lyDo;
        $kl->kl_taoMoi = Carbon::now();
        $kl->kl_capNhat = Carbon::now();
        //dd($kl);
        $kl->save();
        return redirect()->route('admin.kyluat.index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kl = KyLuat::find($id);


        $kl->delete();
        return redirect()->route('admin.kyluat.index'); 
    }
}
