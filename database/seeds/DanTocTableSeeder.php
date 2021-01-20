<?php

use Illuminate\Database\Seeder;

class DanTocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Kinh', 'Chăm', 'Khơmer', 'Hoa'];
        for($i=1; $i<=count($types); $i++){
            array_push($list, [
                'dt_ma'     =>  $i, 
                'dt_ten'    =>  $types[$i-1]
            ]);
        }
        DB::table('dantoc')->insert($list);
    }
}
