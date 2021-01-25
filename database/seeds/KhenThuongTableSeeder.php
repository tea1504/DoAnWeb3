<?php

use Illuminate\Database\Seeder;

class KhenThuongTableSeeder extends Seeder
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
            'Lorem ipsum dolor sit amet',
            'consectetur adipiscing elit',
            'sed do eiusmod tempor incididunt',
            'ut labore et dolore magna aliqua',
            'In fermentum et sollicitudin ac',
            'orci phasellus egestas',
            'Dignissim convallis aenean et tortor at',
            'Donec enim diam vulputate ut pharetra sit',
            'Orci eu lobortis elementum nibh',
            'Vitae tortor condimentum lacinia quis vel eros.',
        ];

        $faker = Faker\Factory::create('vi_VN');
        $k = 1;
        for ($i = 1; $i <= 20; $i++) {
            if ($faker->numberBetween(1, 100) <= 10) {
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
                    'kt_ma' => $k++,
                    'nv_ma' => $ma . $i,
                    'kt_ngayKy' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                    'kt_nguoiKy' => $ma2 . $i2,
                    'kt_lyDo' => $types[$faker->numberBetween(0, count($types) - 1)]
                ]);
            }
        }
        DB::table('khenthuong')->insert($list);
    }
}
