<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list =[];
        $types =[
            [1,'Admin','Quản trị trang web ...'],
            [2,'User','Người dùng với các quyền được cho phép'],
            [3,'Quản lý','Người dùng có chức vụ cao với các quyền được cho phép']
        ];
        for($i=0; $i < count($types);$i++){
            array_push($list,[
                'role_ma' =>$types[$i][0],
                'role_ten' =>$types[$i][1],
                'role_moTa' =>$types[$i][2]
            ]);   
        }
        DB::table('role')->insert($list);
    }
}
