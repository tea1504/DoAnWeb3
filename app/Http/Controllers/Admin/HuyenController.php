<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Huyen;
use App\Tinh;
use Carbon\Carbon;
use Session;

class HuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quanlychung.huyen.index')
            ->with('dsh', Huyen::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quanlychung.huyen.create')
            ->with('dst', Tinh::all());
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
            'h_ten' => 'required|min:3|max:50',
            't_ma' => 'required',
        ]);
        $h = new Huyen();
        $h->h_ten = $request->h_ten;
        $h->t_ma = $request->t_ma;
        $h->h_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $h->h_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $h->save();
        Session::flash('alert', 'Đã tạo thành công huyện ' . $request->h_ten);
        return redirect(route('admin.huyen.create'));
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
        return view('admin.quanlychung.huyen.edit')
            ->with('h', Huyen::find($id))
            ->with('dst', Tinh::all());
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
            'h_ten' => 'required|min:3|max:50',
            't_ma' => 'required',
        ]);
        $h = Huyen::find($id);
        $h->h_ten = $request->h_ten;
        $h->t_ma = $request->t_ma;
        $h->h_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $h->save();
        Session::flash('alert', 'Đã cập nhật thành công huyện ' . $request->h_ten);
        return view('admin.quanlychung.huyen.edit')
            ->with('h', Huyen::find($id))
            ->with('dst', Tinh::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $h = Huyen::find($id);
        $h->delete();
    }
}
