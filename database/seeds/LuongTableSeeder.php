<?php

use Illuminate\Database\Seeder;

class LuongTableSeeder extends Seeder
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
            [1, 'A3.1', 'Công chức loại A3, nhóm 1'],
            [2, 'A3.2', 'Công chức loại A3, nhóm 2'],
            [3, 'A2.1', 'Công chức loại A2, nhóm 1'],
            [4, 'A2.2', 'Công chức loại A2, nhóm 2'],
            [5, 'A1', 'Công chức loại A1'],
            [6, 'A0', 'Công chức loại A0'],
            [7, 'B', 'Công chức loại B'],
            [8, 'C1', 'Công chức loại C1'],
            [9, 'C2', 'Công chức loại C2'],
            [10, 'C3', 'Công chức loại C3']
        ];
        $faker = Faker\Factory::create('vi_VN');
        for($i=1; $i<=40; $i++){
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100 )
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';
            $ng = $faker->numberBetween(1, 10);
            switch ($ng) {
                case 1:
                case 2:
                    $b = $faker->numberBetween(1, 6);
                    break;
                case 3:
                case 4:
                    $b = $faker->numberBetween(1, 8);
                    break;
                case 5:
                    $b = $faker->numberBetween(1, 9);
                    break;
                case 6:
                    $b = $faker->numberBetween(1, 10);
                    break;
                case 7:
                case 8:
                case 9:
                case 10:
                    $b = $faker->numberBetween(1, 12);
                    break;
            }
            array_push($list,[
                'l_ma' => $i,
                'nv_ma' => $ma . $i,
                'l_tinhTrang' => 1,
                'ng_ma' => $ng,
                'b_ma' => $b,
                'pc_ma' => $faker->numberBetween(1, 8),
            ]);
        }
        DB::table('luong')->insert($list);
    }
}
