<?php

use Illuminate\Database\Seeder;

class NhomMauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['A', 'B', 'AB', 'O'];
        for($i=1; $i<=count($types); $i++){
            array_push($list, [
                'nm_ma'     =>  $i, 
                'nm_ten'    =>  $types[$i-1]
            ]);
        }
        DB::table('nhommau')->insert($list);
    }
}
