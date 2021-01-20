<?php

use Illuminate\Database\Seeder;

class TinhTableSeeder extends Seeder
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
            [1, 'TP Cần Thơ'], 
            [2, 'An Giang'], 
            [3, 'Vĩnh Long'], 
            [4, 'Hậu Giang'], 
            [5, 'Đồng Tháp']
        ];
        for($i=0; $i<count($types); $i++){
            array_push($list, [
                't_ma'     =>  $types[$i][0], 
                't_ten'    =>  $types[$i][1]
            ]);
        }
        DB::table('tinh')->insert($list);
    }
}
