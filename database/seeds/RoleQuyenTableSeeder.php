<?php

use Illuminate\Database\Seeder;
class RoleQuyenTableSeeder extends Seeder
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
            [1,1],
            [1,2],
            [1,3],
            [1,4],
            [1,5],
            [1,6],
            [1,7],
            [2,5],
            [2,6],
            [2,7]
        ];
        for($i=0; $i<count($types); $i++){
            array_push($list, [
                'role_ma'     =>   $types[$i][0], 
                'q_ma'     =>   $types[$i][1]
            ]);
        }
        DB::table('role_quyen')->insert($list);
    }
}
