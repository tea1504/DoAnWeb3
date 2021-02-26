<?php

namespace App\Http\Controllers\Admin;

use App\ChucVu;
use App\CongViec;
use App\DonVi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TuyenDung;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Exports\TuyenDungExport;
use App\Http\Requests\TuyenDungCreateRequest;
use App\NhanVien;
use Carbon\Carbon;
use Session;
use Validator;
class TuyenDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dstuyendung=TuyenDung::all();
        return view('admin.tuyendung.index')
        ->with('dstuyendung',$dstuyendung);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', TuyenDung::class);
        $dsnv= NhanVien :: all();
        $dscv= ChucVu :: all();
        $dscviec= CongViec :: all();
        $dsdv= DonVi :: all();
        return view('admin.tuyendung.create')
        ->with('dsnv',$dsnv)
        ->with('dscv',$dscv)
        ->with('dscviec',$dscviec)
        ->with('dsdv',$dsdv);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TuyenDungCreateRequest $request)
    {
        $this->authorize('create', TuyenDung::class);
        $td = new TuyenDung();
        $td->nv_ma=$request->nv_ma;
        $td->td_ngay=$request->td_ngay;
        $td->td_ngheTruocDay=$request->td_ngheTruocDay;
        $td->dv_ma=$request->dv_ma;
        $td->td_coQuanTuyen=$request->td_coQuanTuyen;
        $td->cvu_ma=$request->cvu_ma;
        $td->td_ngayLam=$request->td_ngayLam;
        $td->cv_ma=$request->cv_ma;
        $td->td_soTruong=$request->td_soTruong;
        $td->td_taoMoi=Carbon::now('Asia/Ho_Chi_Minh');
        $td->td_capNhat=Carbon::now('Asia/Ho_Chi_Minh');
        $td->save();
        Session::flash('alert','Thêm mới thành công dữ liệu tuyển dụng của nhân viên'. NhanVien::find($request->nv_ma)->nv_hoTen);
        return redirect(route('admin.tuyendung.create'));
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
        $dsnv= NhanVien :: all();
        $dscv= ChucVu :: all();
        $dscviec= CongViec :: all();
        $dsdv= DonVi :: all();
        $td = TuyenDung::find($id);
        $this->authorize('update', $td);
        return view('admin.tuyendung.edit')
        ->with('dsnv',$dsnv)
        ->with('dscv',$dscv)
        ->with('dscviec',$dscviec)
        ->with('dsdv',$dsdv)
        ->with('td', $td);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TuyenDungCreateRequest $request, $id)
    {
        $dsnv= NhanVien :: all();
        $dscv= ChucVu :: all();
        $dscviec= CongViec :: all();
        $dsdv= DonVi :: all();
        $td = TuyenDung::find($id);
        $this->authorize('update', $td);
        $td->nv_ma=$request->nv_ma;
        $td->td_ngay=$request->td_ngay;
        $td->td_ngheTruocDay=$request->td_ngheTruocDay;
        $td->dv_ma=$request->dv_ma;
        $td->td_coQuanTuyen=$request->td_coQuanTuyen;
        $td->cvu_ma=$request->cvu_ma;
        $td->td_ngayLam=$request->td_ngayLam;
        $td->cv_ma=$request->cv_ma;
        $td->td_soTruong=$request->td_soTruong;
        $td->td_capNhat=Carbon::now('Asia/Ho_Chi_Minh');
        $td->save();
        Session::flash('alert', 'Đã cập nhật thành công tuyển dụng cho nhân viên ' . NhanVien::find($request->nv_ma)->nv_hoTen);
        return view('admin.tuyendung.edit')
        ->with('dsnv',$dsnv)
        ->with('dscv',$dscv)
        ->with('dscviec',$dscviec)
        ->with('dsdv',$dsdv)
        ->with('td', $td);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $td = TuyenDung::find($id);
        $this->authorize('delete', $td);
        $td->delete();
        return 'ok';
    }
    public function print()
    {
        $result = TuyenDung::all();
        return view('admin.tuyendung.print')
            ->with('dstuyendung', $result);
    }
    public function pdf()
    {
        $result = TuyenDung::all();
        $data = [
            'dstuyendung' => $result,
        ];
        $pdf = PDF::loadView('admin.tuyendung.pdf', $data);
        return $pdf->download('DanhSachTuyenDung.pdf');
    }
    public function excel()
    {
       
        return Excel::download(new TuyenDungExport, 'DanhSachTuyenDung.xlsx');
    }
}
