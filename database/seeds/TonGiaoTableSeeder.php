<?php

use Illuminate\Database\Seeder;

class TonGiaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Không Tôn Giáo', 'Phật Giáo', 'Công Giáo', 'Cao Đài', 'Hòa Hảo', 'Tinh Lành', 'Hồi Giáo', 'Ấn Độ Giáo', 'Tôn Giáo Khác'];
        for($i=1; $i<=count($types); $i++){
            array_push($list, [
                'tg_ma'     =>  $i, 
                'tg_ten'    =>  $types[$i-1]
            ]);
        }
        DB::table('tongiao')->insert($list);
    }
}
