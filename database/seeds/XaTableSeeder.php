<?php

use Illuminate\Database\Seeder;

class XaTableSeeder extends Seeder
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
            [1, 'An Nghiệp', 1],
            [2, 'An Cư', 1],
            [3, 'Hưng Phú', 2],
            [4, 'Hưng Thạnh', 2],
            [5, 'Châu Văn Liêm', 3],
            [6, 'Thới An', 3],
            [7, 'Thuận Hưng', 4],
            [8, 'Trung Nhứt', 4],
            [9, 'Trung An', 5],
            [10, 'Trung Thạnh', 5],
            [11, 'Mỹ Long', 6],
            [12, 'Mỹ Thới', 6],
            [13, 'Núi Sam', 7],
            [14, 'Vĩnh Tế', 7],
            [15, 'Ba Chúc', 8],
            [16, 'Cô Tô', 8],
            [17, 'Mỹ Thuận', 9],
            [18, 'Tân Bình', 9],
            [19, 'Hòa Ninh', 10],
            [20, 'Long Phước', 10],
            [21, 'Phường I', 11],
            [22, 'Phường II', 11],
            [23, 'Hòa An', 12],
            [24, 'Hòa Mỹ', 12],
            [25, 'Bảy Ngàn', 13],
            [26, 'Rạch Gòi', 13],
            [27, 'Mỹ Phú', 14],
            [28, 'Hòa Thuận', 14],
            [29, 'An Hòa', 15],
            [30, 'Tân Duy Đông', 15],
            [31, 'Định Hòa', 16],
            [32, 'Hòa Long', 16],
        ];
        for($i=0; $i<count($types); $i++){
            array_push($list, [
                'x_ma'     =>  $types[$i][0],
                'x_ten'     =>  $types[$i][1],
                'h_ma'     =>  $types[$i][2]
            ]);
        }
        DB::table('xa')->insert($list);
    }
}
