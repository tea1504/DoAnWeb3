<?php

use Illuminate\Database\Seeder;

class BacTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        for($i=1; $i<=12; $i++){
            array_push($list,[
                'b_ma' => $i,
                'b_ten' => 'Bậc '.$i
            ]);
        }
        DB::table('bac')->insert($list);
    }
}
