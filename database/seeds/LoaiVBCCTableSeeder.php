<?php

use Illuminate\Database\Seeder;

class LoaiVBCCTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Khác', 'Tin học', 'Ngoại ngữ', 'Lý luận chính trị', 'Quản lý nhà nước'];
        for($i=1; $i<=count($types);$i++){
            array_push($list, [
                'lvbcc_ma' => $i,
                'lvbcc_ten' => $types[$i-1]
            ]);
        }
        DB::table('loai_vbcc')->insert($list);
    }
}
