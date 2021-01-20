<?php

use Illuminate\Database\Seeder;

class HuyenTableSeeder extends Seeder
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
            [1, 'Ninh Kiều', 1], 
            [2, 'Cái Răng', 1], 
            [3, 'Ô Môn', 1], 
            [4, 'Thốt Nốt', 1], 
            [5, 'Cờ Đỏ', 1],
            [6, 'Long Xuyên', 2],
            [7, 'Châu Đốc', 2],
            [8, 'Tri Tôn', 2],
            [9, 'Bình Tân', 3],
            [10, 'Long Hồ', 3],
            [11, 'Vị Thanh', 4],
            [12, 'Phụng Hiệp', 4],
            [13, 'Châu Thành A', 4],
            [14, 'Cao Lãnh', 5],
            [15, 'Sa Đéc', 5],
            [16, 'Lai Vung', 5],
        ];
        for($i=0; $i<count($types); $i++){
            array_push($list, [
                'h_ma'     =>  $types[$i][0],
                'h_ten'     =>  $types[$i][1],
                't_ma'     =>  $types[$i][2]
            ]);
        }
        DB::table('huyen')->insert($list);
    }
}
