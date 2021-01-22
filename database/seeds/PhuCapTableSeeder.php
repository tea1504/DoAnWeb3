<?php

use Illuminate\Database\Seeder;

class PhuCapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Phụ cấp chức vụ, chức danh công việc','Phụ cấp trách nhiệm','Phụ cấp thâm niên','Phụ cấp khu vực','Phụ cấp nặng nhọc, độc hại, nguy hiểm','Phụ cấp lưu động','Phụ cấp thu hút','Phụ cấp mang tính chất tương tự'];
        $faker = Faker\Factory::create('vi_VN');
        for($i=1; $i<=count($types); $i++){
            array_push($list,[
                'pc_ma' => $i,
                'pc_ten' => $types[$i-1],
                'pc_heSoPhuCap' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.5, $max = 1.5)
            ]);
        }
        DB::table('phucap')->insert($list);
    }
}
