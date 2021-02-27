<?php

use Illuminate\Database\Seeder;

class QuaTrinhCongTacTableSeeder extends Seeder
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
            if ($faker->numberBetween(1, 100) >= 65) {
                $ma = 'CB';
                if ($i < 10)
                    $ma .= '000';
                else if ($i < 100)
                    $ma .= '00';
                else if ($i < 1000)
                    $ma .= '0';
                $t = (int)$faker->year($max = '-18 years');
                $t1 = ($t + $faker->numberBetween(1, 100) % 5 + 1);
                $n = $faker->numberBetween(1, 3);
                for ($j = 1; $j <= $n; $j++) {
                    array_push($list, [
                        'qtct_ma' => $k++,
                        'nv_ma' => $ma . $i,
                        'qtct_tuNgay' => $faker->numberBetween(1, 12) . '/' . $t,
                        'qtct_denNgay' => $faker->numberBetween(1, 12) . '/' . $t1,
                        'cvu_ma' => $faker->numberBetween(1, 23),
                        'dv_ma' => $faker->numberBetween(1, 18),
                        'nb_ma' => $faker->numberBetween(1, 95)
                    ]);
                    $t = $t1 + 1;
                    $t1 = ($t + $faker->numberBetween(1, 100) % 5 + 1);
                }
            }
        }
        DB::table('quatrinhcongtac')->insert($list);
    }
}
