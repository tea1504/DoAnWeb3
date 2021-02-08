<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KhenThuong;
use App\NhanVien;

class KhenThuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_kt = KhenThuong::all();
        //$ds_kt = KhenThuong::paginate(5);
        return view('admin.khenthuong.index')
        ->with('danhsachkhenthuong',$ds_kt);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_nv = NhanVien::all();
        return view('admin.khenthuong.create')
        ->with('danhsachnhanvien',$ds_nv);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kt = new KhenThuong();
        $kt->nv_ma = $request->nv_ma;
        $kt->kt_ngayKy = $request->kt_ngayKy;
        $kt->kt_nguoiKy = $request->nv_ma;
        $kt->kt_lyDo = $request->kt_lyDo;
        $kt->kt_taoMoi = $request->kt_taoMoi;
        $kt->kt_capNhat = $request->kt_capNhat;

        $kt->save();
        return redirect()->route('admin.khenthuong.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $mytime = Carbon::now();
        $ds_kt = KhenThuong::find($id);   
        $ds_nv = NhanVien::all();
        return view('admin.khenthuong.edit')
        ->with('kt',$ds_kt)
        ->with('danhsachnhanvien',$ds_nv);
        
        
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

        $kt = KhenThuong::find($id);

        $kt->nv_ma = $request->nv_ma;
        $kt->kt_ngayKy = $request->kt_ngayKy;
        $kt->kt_nguoiKy = $request->nv_ma;
        $kt->kt_lyDo = $request->kt_lyDo;
        $kt->kt_taoMoi = $request->kt_taoMoi;
        $kt->kt_capNhat = $request->kt_capNhat;
        //dd($kt->kt_ma);
        //dd($kt);
        $kt->save();
        return redirect()->route('admin.khenthuong.index'); 
        
       
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kt = KhenThuong::where("kt_ma",$id)->first();
        $kt2 = KhenThuong::where("kt_ma",$id);
        //dd($kt->kt_ma);
        //dd($id);
        $kt2->delete();
        return redirect()->route('admin.khenthuong.index');

    }
}
