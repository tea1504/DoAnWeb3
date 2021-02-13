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
use App\NhanVien;

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
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
        // return view('admin.tuyendung.excel')->with("dstuyendung", TuyenDung::all());
        return Excel::download(new TuyenDungExport, 'DanhSachTuyenDung.xlsx');
    }
}
