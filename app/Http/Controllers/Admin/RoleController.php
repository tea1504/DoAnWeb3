<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Exports\RoleExport;
use App\Http\Requests\RoleCreateRequest;
use App\Quyen;
use App\RoleQuyen;
use Carbon\Carbon;
use Session;
use Validator;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsrole = Role::all();
        return view('admin.role.index')
            ->with('dsrole', $dsrole);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);
        return view('admin.role.create')
            ->with('dsq', Quyen::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $this->authorize('create', Role::class);
        $role = new Role();
        $role->role_ten = $request->role_ten;
        $role->role_mota = $request->role_mota;
        $role->role_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $role->role_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $role->save();
        if ($request->has('quyen')) {
            foreach ($request->quyen as $q) {
                $role_quyen = new RoleQuyen();
                $role_quyen->role_ma = $role->role_ma;
                $role_quyen->q_ma = $q;
                $role_quyen->save();
            }
        }
        Session::flash('alert', 'Thêm mới thành công dữ liệu vai trò!');
        return redirect(route('admin.role.create'));
        return $request->all();
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

        $role = Role::find($id);
        $this->authorize('update', $role);
        return view('admin.role.edit')
            ->with('role', $role)
            ->with('dsq', Quyen::all());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleCreateRequest $request, $id)
    {
        $role = role::find($id);
        $this->authorize('update', $role);
        $role->role_ten = $request->role_ten;
        $role->role_mota = $request->role_mota;
        $role->role_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $role->save();
        foreach ($role->roleQuyen as $rq){
            DB::select('DELETE FROM role_quyen WHERE role_ma = ? AND q_ma = ?', [$rq->role_ma, $rq->q_ma]);
        }
        if ($request->has('quyen')) {
            foreach ($request->quyen as $q) {
                $role_quyen = new RoleQuyen();
                $role_quyen->role_ma = $role->role_ma;
                $role_quyen->q_ma = $q;
                $role_quyen->save();
            }
        }
        Session::flash('alert', 'Đã cập nhật thành công vai trò! ');
        // return view('admin.role.edit')
        //     ->with('role', $role)
        //     ->with('dsq', Quyen::all());
        return redirect(route('admin.role.edit', ['id'=>$role->role_ma]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $this->authorize('delete', $role);
        $role->delete();
        return 'ok';
    }
    public function print()
    {
        $result = Role::all();
        return view('admin.role.print')
            ->with('dsrole', $result);
    }
    public function pdf()
    {
        $result = Role::all();
        $data = [
            'dsrole' => $result,
        ];
        $pdf = PDF::loadView('admin.role.pdf', $data);
        return $pdf->download('DanhSachRole.pdf');
    }
    public function excel()
    {

        return Excel::download(new RoleExport, 'DanhSachRole.xlsx');
    }
}
