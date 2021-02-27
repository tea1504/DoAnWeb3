<?php

use Illuminate\Database\Seeder;

class KyLuatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $faker = Faker\Factory::create('vi_VN');
        $k = 1;
        for ($i = 1; $i <= 40; $i++) {
            if ($faker->numberBetween(1, 100) <= 5) {
                $ma = 'CB';
                if ($i < 10)
                    $ma .= '000';
                else if ($i < 100)
                    $ma .= '00';
                else if ($i < 1000)
                    $ma .= '0';
                $ma2 = 'CB';
                do {
                    $i2 = $faker->numberBetween(1, 20);
                } while ($i2 == $i);
                if ($i2 < 10)
                    $ma2 .= '000';
                else if ($i2 < 100)
                    $ma2 .= '00';
                else if ($i2 < 1000)
                    $ma2 .= '0';
                array_push($list, [
                    'kl_ma' => $k++,
                    'nv_ma' => $ma . $i,
                    'kl_ngayKy' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                    'kl_nguoiKy' => $ma2 . $i2,
                    'kl_lyDo' => $faker->sentence($nbWords = $faker->numberBetween(6, 10), $variableNbWords = true)
                ]);
            }
        }
        DB::table('kyluat')->insert($list);
    }
}