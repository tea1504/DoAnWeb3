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
            ['',''],
            ['',''],
        ];
        for($i=1;$i<=count($types);$i++){
            array_push($list, [
                'cv_ma'   => $i,
                'cv_ten'  => $types[$i][1], 
                'cv_moTa'  => $types[$i][2], 
            ]);
        }
        DB::table('congviec')->insert($list);
    }
}
