<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LichSuBanThan;
use App\Luong;
use App\NhanVien;
use App\NoiSinh;
use App\QueQuan;
use App\TuyenDung;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Session::get('user')[0]->nv_ma;
        if (Luong::where('nv_ma', $id)->first() == null || TuyenDung::where('nv_ma', $id)->first() == null || QueQuan::where('nv_ma', $id)->first() == null || NoiSinh::where('nv_ma', $id)->first() == null || LichSuBanThan::where('nv_ma', $id)->first() == null) {
            Session::flash('alert-error', 'Tài khoản chưa đủ thông tin hãy liên hệ với quản trị viên để bổ sung thông tin');
            return redirect()->back();
        }
        return view('user.index')
            ->with('d', NhanVien::find($id));
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
}
