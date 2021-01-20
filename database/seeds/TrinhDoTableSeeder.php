<?php

use Illuminate\Database\Seeder;

class TrinhDoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        for($i=12; $i>=1; $i--){
            array_push($list, [
                'td_ma'     =>  13 - $i, 
                'td_ten'    =>  $i.'/12'
            ]);
        }
        DB::table('trinhdo')->insert($list);
    }
}
