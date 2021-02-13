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
            [1,8],
            [2,6],
            [3,5],
            [3,6],
            [3,7],
            [3,8],
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
