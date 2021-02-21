<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QueQuanCreateRequest;
use App\Http\Requests\QueQuanUpdateRequest;
use App\NhanVien;
use App\QueQuan;
use App\Tinh;
use Carbon\Carbon;
use Session;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;

class QueQuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quequan.index')
            ->with('dsqq', QueQuan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quequan.create')
            ->with('dst', Tinh::all())
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QueQuanCreateRequest $request)
    {
        $qq = new QueQuan();
        $qq->nv_ma = $request->nv_ma;
        $qq->t_ma = $request->t_ma;
        $qq->h_ma = $request->h_ma;
        $qq->x_ma = $request->x_ma;
        $qq->qq_diaChi = $request->qq_diaChi;
        $qq->qq_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $qq->qq_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $qq->save();
        Session::flash('alert', 'Đã thêm mới thành công');
        return redirect(route('admin.quequan.create'));
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
        return view('admin.quequan.edit')
            ->with('qq', QueQuan::find($id))
            ->with('dst', Tinh::all())
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QueQuanUpdateRequest $request, $id)
    {
        $qq = QueQuan::find($id);
        $qq->t_ma = $request->t_ma;
        $qq->h_ma = $request->h_ma;
        $qq->x_ma = $request->x_ma;
        $qq->qq_diaChi = $request->qq_diaChi;
        $qq->qq_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $qq->save();
        Session::flash('alert', 'Đã cập nhật thành công');
        return view('admin.quequan.edit')
            ->with('qq', QueQuan::find($id))
            ->with('dst', Tinh::all())
            ->with('dsnv', NhanVien::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qq = QueQuan::find($id);
        $qq->delete();
    }

    public function print()
    {
        return view('admin.quequan.print')
            ->with('dsqq', QueQuan::all());
    }
    public function pdf()
    {
        $result = QueQuan::all();
        $data = [
            'dsqq' => $result,
        ];
        // return view('admin.quequan.pdf')->with("dsqq", $result);
        $pdf = PDF::loadView('admin.quequan.pdf', $data);
        return $pdf->download('DanhSachQueQuan.pdf');
    }
    public function excel()
    {
        // return view('admin.thongtinchung.excel')
        //     ->with('dsttc', NhanVien::all());
        return Excel::download(new ThongTinChungExport, 'DanhSachThongTinChung.xlsx');
    }
}
