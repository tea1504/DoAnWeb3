<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhanVien;
use Barryvdh\DomPDF\Facade as PDF;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NhanVien::all();
        return view('admin.nhanvien.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $result = NhanVien::find($id);
        return view('admin.nhanvien.show')
            ->with('nv', $result);
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
    public function printDetail($id)
    {
        $result = NhanVien::find($id);
        return view('admin.nhanvien.print-chitiet')
            ->with('nv', $result);
    }
    public function pdfDetail($id)
    {
        $result = NhanVien::find($id);
        $data = [
            'nv' => $result,
        ];
        $pdf = PDF::loadView('admin.nhanvien.pdf-chitiet', $data);
        return $pdf->download('NhanVien' . $result->nv_ma . '.pdf');
    }
    public function print()
    {
        $result = NhanVien::all();
        return view('admin.nhanvien.print')
            ->with('dsnv', $result);
    }
}
