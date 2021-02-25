<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Huyen;
use App\Xa;
use Carbon\Carbon;
use Session;

class XaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.xa.index')
            ->with('dsx', Xa::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.xa.create')
            ->with('dsh', Huyen::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'x_ten' => 'required|min:3|max:50',
            'h_ma' => 'required',
        ]);
        $x = new Xa();
        $x->x_ten = $request->x_ten;
        $x->h_ma = $request->h_ma;
        $x->x_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $x->x_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $x->save();
        Session::flash('alert', 'Đã tạo thành công xã ' . $request->x_ten);
        return redirect(route('admin.xa.create'));
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
        return view('admin.quanlychung.xa.edit')
            ->with('x', Xa::find($id))
            ->with('dsh', Huyen::all());
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
        $this->validate($request, [
            'x_ten' => 'required|min:3|max:50',
            'h_ma' => 'required',
        ]);
        $x = Xa::find($id);
        $x->x_ten = $request->x_ten;
        $x->h_ma = $request->h_ma;
        $x->x_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $x->save();
        Session::flash('alert', 'Đã cập nhật thành công xã ' . $request->x_ten);
        return view('admin.quanlychung.xa.edit')
            ->with('x', Xa::find($id))
            ->with('dsh', Huyen::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $x = Xa::find($id);
        $x->delete();
    }
}
