<?php

use Illuminate\Database\Seeder;

class DonViTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Ban giám đốc','Tổ phòng ban','Tổ hành chánh','Nhân viên'];
        for($i=1; $i<=count($types); $i++){
            array_push($list, [
                'dv_ma'     =>  $i, 
                'dv_ten'    =>  $types[$i-1]
            ]);
        }
        DB::table('donvi')->insert($list);
    }
}
