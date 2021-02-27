<?php

use Illuminate\Database\Seeder;

class TuyenDungTableSeeder extends Seeder
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
        for($i=1; $i<=40; $i++){
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100 )
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';
            $d = $faker->dateTimeBetween($startDate = '-25 years', $endDate = '-22 years', $timezone = null);
            array_push($list,[
                'td_ma' => $i,
                'nv_ma' => $ma . $i,
                'td_ngay' => $d,
                'td_ngheTruocDay' => 'Không nghề nghiệp',
                'dv_ma' => $faker->numberBetween(1, 18),
                'td_coQuanTuyen' => '',
                'td_ngayLam' => $faker->dateTimeBetween($startDate = $d, $endDate = '-22 years', $timezone = null),
                'cv_ma' => $faker->numberBetween(1, 16),
                'cvu_ma' => $faker->numberBetween(1, 23),
                'td_soTruong' => ''
            ]);
        }
        DB::table('tuyendung')->insert($list);
    }
}
