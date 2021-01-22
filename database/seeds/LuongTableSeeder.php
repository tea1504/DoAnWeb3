<?php

use Illuminate\Database\Seeder;

class LuongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = [
            [1, 'A3.1', 'Công chức loại A3, nhóm 1'],
            [2, 'A3.2', 'Công chức loại A3, nhóm 2'],
            [3, 'A2.1', 'Công chức loại A2, nhóm 1'],
            [4, 'A2.2', 'Công chức loại A2, nhóm 2'],
            [5, 'A1', 'Công chức loại A1'],
            [6, 'A0', 'Công chức loại A0'],
            [7, 'B', 'Công chức loại B'],
            [8, 'C1', 'Công chức loại C1'],
            [9, 'C2', 'Công chức loại C2'],
            [10, 'C3', 'Công chức loại C3']
        ];
        for($i=1; $i<=20; $i++){
            array_push($list,[
                'ng_ma' => ,
                'nv_ma' => ,
                'l_tinhTrang' => ,
                'l_luongCanBan' => ,
                'ng_ma' => ,
                'b_ma' => ,
                'pc_ma' => ,
            ]);
        }
        DB::table('ngach')->insert($list);
    }
}
