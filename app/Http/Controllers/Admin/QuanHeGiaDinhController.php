<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhanVien;
use App\QuanHeGiaDinh;
use Carbon\Carbon;
use Session;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\QuanHeGiaDinhExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Policies\QuanHeGiaDinhPolicy;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        
        $qhgd->save();
        Session::flash('alert', 'Đã thêm mới thành công quan hệ gia đình cho nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);

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
        $qhgd->qhgd_taoMoi = Carbon::now();  
        $qhgd->qhgd_capNhat = Carbon::now(); 

        $qhgd->save();
        Session::flash('alert', 'Đã cập nhật  thành công văn bằng cho nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);

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
    
    public function print($id = null)
    {
        $this->authorize('inAn', QuanHeGiaDinh::class);
        return view('admin.quanhegiadinh.print')
            ->with('dsqhgd', QuanHeGiaDinh::all())
            ->with('id', $id);
    }
    public function pdf($id = null)
    {
        $this->authorize('inAn', QuanHeGiaDinh::class);
        $result = QuanHeGiaDinh::all();
        $data = [
            'dsqhgd' => $result,
            'id' => $id,
        ];
        // return view('admin.vanbang.pdf')->with("dsvbcc", $result);
        $pdf = PDF::loadView('admin.quanhegiadinh.pdf', $data);
        return $pdf->download('DanhSachQuanHeGiaDinh.pdf');
    }
    public function excel()
    {
        $this->authorize('inAn', VBCC::class);
        // return view('admin.vanbang.excel')->with("dsvbcc", VBCC::all());
        return Excel::download(new QuanHeGiaDinhExport, 'DanhSachQuanHeGiaDinh.xlsx');
    }
}
