<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KhenThuong;
use App\NhanVien;
use Carbon\Carbon;
use Session;
use App\Http\Requests\KhenThuongCreateRequest;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\KhenThuongExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Policies\KhenThuongPolicy;


class KhenThuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = NhanVien::all();
        return view('admin.khenthuong.index')
            ->with('dsnv', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mytime = Carbon::now();
        $ds_nv = NhanVien::all();
        $ds_kt = KhenThuong::all();
        return view('admin.khenthuong.create')
        ->with('danhsachnhanvien',$ds_nv)
        ->with('kt',$ds_kt)
        ->with('mytime',$mytime);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhenThuongCreateRequest $request)
    {
        $kt = new KhenThuong();
        $kt->nv_ma = $request->nv_ma;
        $kt->kt_ngayKy = $request->kt_ngayKy;
        $kt->kt_nguoiKy = $request->kt_nguoiKy;
        $kt->kt_lyDo = $request->kt_lyDo;
        $kt->kt_taoMoi = Carbon::now();
        $kt->kt_capNhat = Carbon::now();
        //dd($kt->kt_nguoiKy);
        $kt->save();
        Session::flash('alert', 'Đã thêm mới thành công khen thưởng cho nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
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

        $kt = KhenThuong::find($id);
        $kt->nv_ma = $request->nv_ma;
        $kt->kt_ngayKy = $request->kt_ngayKy;
        $kt->kt_nguoiKy = $request->kt_nguoiKy;
        $kt->kt_lyDo = $request->kt_lyDo;
        $kt->kt_capNhat =  Carbon::now();
        //dd($kt->kt_ma);
        //dd($kt);
        $kt->save();
        Session::flash('alert', 'Đã cập nhật thành công khen thưởng cho nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
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

    public function print()
    {
        //$this->authorize('inAn', QuanHeGiaDinh::class);
        return view('admin.khenthuong.print')
            ->with('dskt', KhenThuong::all());
    }
    public function pdf($id = null)
    {
        //$this->authorize('inAn', QuanHeGiaDinh::class);
        $result = KhenThuong::all();
        $data = [
            'dskt' => $result,
            'id' => $id,
        ];
        // return view('admin.vanbang.pdf')->with("dsvbcc", $result);
        $pdf = PDF::loadView('admin.khenthuong.pdf', $data);
        return $pdf->download('DanhSachKhenThuong.pdf');
    }
    public function excel()
    {
        //$this->authorize('inAn', VBCC::class);
        // return view('admin.vanbang.excel')->with("dsvbcc", VBCC::all());
        return Excel::download(new KhenThuongExport, 'DanhSachKhenThuong.xlsx');
    }
}
