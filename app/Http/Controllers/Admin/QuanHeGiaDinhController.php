<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhanVien;
use App\QuanHeGiaDinh;
use Carbon\Carbon;
use Session;
use App\Http\Requests\QuanHeGiaDinhCreateRequest;

class QuanHeGiaDinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = NhanVien::all();
        
        return view('admin.quanhegiadinh.index')
        ->with('dsnv', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_nv = NhanVien::all();
        return view('admin.quanhegiadinh.create')
        ->with('danhsachnhanvien',$ds_nv);
    }

   /*  public function create_id($id = null)
    {
        $this->authorize('create', VBCC::class);
        return view('admin.vanbang.create')
            ->with('dsnv', NhanVien::all())
            ->with('dslvbcc', LoaiVBCC::all())
            ->with('id', $id);
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuanHeGiaDinhCreateRequest $request)
    {
        $qhgd = new QuanHeGiaDinh();
        $qhgd->nv_ma = $request->nv_ma;
        $qhgd->qhgd_ten = $request->qhgd_ten; 
        $qhgd->qhgd_moiQuanHe = $request->qhgd_moiQuanHe; 
        $qhgd->qhgd_namSinh = $request->qhgd_namSinh; 
        $qhgd->qhgd_diaChi = $request->qhgd_diaChi; 
        $qhgd->qhgd_ngheNghiep = $request->qhgd_ngheNghiep; 
        $qhgd->qhgd_nuocNgoai = $request->qhgd_nuocNgoai; 
        $qhgd->qhgd_taoMoi = Carbon::now(); 
        $qhgd->qhgd_capNhat = Carbon::now();
        //dd($qhgd);
        $qhgd->save();
        Session::flash('alert', 'Đã thêm mới thành công văn bằng cho nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return redirect()->route('admin.quanhegiadinh.index');

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
        $ds_qhgd = QuanHeGiaDinh::find($id);
        
        $ds_nv = NhanVien::all();
        return view('admin.quanhegiadinh.edit')
        ->with('qhgd',$ds_qhgd)
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
        
        $qhgd = QuanHeGiaDinh::find($id);
        $qhgd->nv_ma = $request->nv_ma;
        $qhgd->qhgd_ten = $request->qhgd_ten; 
        $qhgd->qhgd_moiQuanHe = $request->qhgd_moiQuanHe; 
        $qhgd->qhgd_namSinh = $request->qhgd_namSinh; 
        $qhgd->qhgd_diaChi = $request->qhgd_diaChi; 
        $qhgd->qhgd_ngheNghiep = $request->qhgd_ngheNghiep; 
        $qhgd->qhgd_nuocNgoai = $request->qhgd_nuocNgoai; 
        $qhgd->qhgd_taoMoi = $request->qhgd_taoMoi; 
        $qhgd->qhgd_capNhat = $request->qhgd_capNhat; 

        $qhgd->save();

        return redirect()->route('admin.quanhegiadinh.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qhgd = QuanHeGiaDinh::find($id);
        $qhgd->delete();
        return redirect()->route('admin.quanhegiadinh.index');

    }   
}
