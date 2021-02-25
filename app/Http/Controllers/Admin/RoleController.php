<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Exports\RoleExport;
use App\Http\Requests\RoleCreateRequest;
use Carbon\Carbon;
use Session;
use Validator;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsrole=Role::all();
        return view('admin.role.index')
        ->with('dsrole',$dsrole);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);
        return view('admin.role.create');
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
        $role->role_ten=$request->role_ten;
        $role->role_mota=$request->role_mota;
        $role->role_taoMoi=Carbon::now('Asia/Ho_Chi_Minh');
        $role->role_capNhat=Carbon::now('Asia/Ho_Chi_Minh');
        $role->save();
        Session::flash('alert','Thêm mới thành công dữ liệu vai trò!');
        return redirect(route('admin.role.create'));
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
        ->with('role', $role);
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
        $role->role_ten=$request->role_ten;
        $role->role_mota=$request->role_mota;
        $role->role_taoMoi=Carbon::now('Asia/Ho_Chi_Minh');
        $role->role_capNhat=Carbon::now('Asia/Ho_Chi_Minh');
        $role->save();
        Session::flash('alert', 'Đã cập nhật thành công vai trò! ');
        return view('admin.role.edit')
        ->with('role', $role);
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
