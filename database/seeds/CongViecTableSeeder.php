<?php

use Illuminate\Database\Seeder;

class CongViecTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types =[
            [1,'Lập trình','viết, tạo chương trình'],
            [2,'Thiết kế UX','Tạo giao diện cho khách hàng dễ sử dụng'],
            [3,'Quản lý dự án','Trưởng nhóm, người có trách nhiệm quản cao nhất'],
            [4,'Kiểm thử','Kiểm tra sản phẩm trước khi đưa ra thị trường'],
            [5,'Quan trị hệ thống','Người đảm bảo môi trường phát triển cho nhân viên']
        ];
        for($i=0;$i<count($types);$i++){
            array_push($list, [
                'cv_ma'   => $types[$i][0],
                'cv_ten'  => $types[$i][1], 
                'cv_moTa'  => $types[$i][2], 
            ]);
        }
        DB::table('congviec')->insert($list);
    }
}
