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
<<<<<<< HEAD
        $mytime = Carbon::now();
        $kl = KyLuat::where("kl_ma",$id)->first();
        $ds_nv = NhanVien::all();
        return view('admin.kyluat.edit')
        ->with('kl',$kl)
        ->with('danhsachnhanvien',$ds_nv)
        ->with('mytime',$mytime);
        
=======
        $kl = KyLuat::where("kl_ma",$id)->first();
        $nv = NhanVien::all();
        return view('admin.kyluat.edit')
        ->with('kl',$kl)
        ->with('nv',$nv);
>>>>>>> d8b89c1fd0a2b767a8a01827fbda04e311a6abb6
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
<<<<<<< HEAD
        $kl = KyLuat::find($id);
=======
        $kl = KyLuat::where("kl_ma", $id)->first();
>>>>>>> d8b89c1fd0a2b767a8a01827fbda04e311a6abb6
        $kl->nv_ma = $request->nv_ma;
        $kl->kl_ngayKy = $request->kl_ngayKy;
        $kl->kl_nguoiKy = $request->nv_ma;
        $kl->kl_lyDo = $request->kl_lyDo;
        $kl->kl_taoMoi = $request->kl_taoMoi;
        $kl->kl_capNhat = $request->kl_capNhat;
<<<<<<< HEAD
        //dd($id);
        $kl->save();
        return redirect()->route('admin.kyluat.index'); 

=======
>>>>>>> d8b89c1fd0a2b767a8a01827fbda04e311a6abb6
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
