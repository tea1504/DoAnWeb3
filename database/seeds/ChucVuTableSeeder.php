<?php

use Illuminate\Database\Seeder;

class ChucVuTableSeeder extends Seeder
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
            ['','']
        ];
        //sort($types);

        $today = new DateTime('2019-01-01 08:00:00');

        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'cvu_ma'      => $i,
                'cvu_ten'     => $types[$i][1],
                'cvu_moTa'     => $types[$i][2],
                'cvu_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'cvu_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('chucvu')->insert($list);
    }
}
