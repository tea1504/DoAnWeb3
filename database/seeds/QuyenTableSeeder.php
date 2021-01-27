<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class QuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Xem danh sách nhân viên', 'Thêm nhân viên', 'Sửa nhân viên', 'Xóa nhân viên','Xem danh sách','Sửa danh sách','Xóa danh sách'];
        for($i=1; $i<=count($types); $i++){
            array_push($list, [
                'q_ma'     =>  $i, 
                'q_ten'    =>  $types[$i-1],
                'q_moTa'    =>  ''
            ]);
        }
        DB::table('quyen')->insert($list);
    }
}
