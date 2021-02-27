<?php

use Illuminate\Database\Seeder;

class LichSuBanThanTableSeeder extends Seeder
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
        for ($i = 1; $i <= 40; $i++) {
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100 )
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';
            array_push($list, [
                'lsbt_ma' => $i,
                'nv_ma' => $ma.$i,
                'lsbt_hanhViPhamToi' => $faker->paragraph($nb = $faker->numberBetween(3, 4), $variableNbSentences = true),
                'lsbt_thamGiaToChucChinhTri' => $faker->paragraph($nb = $faker->numberBetween(3, 4), $variableNbSentences = true)
            ]);
        }
        DB::table('lichsubanthan')->insert($list);
    }
}
