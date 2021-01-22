<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PhuCapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $list = [];

        $types = ["Thâm niêm", "Chức vụ", "Lưu động", "Khu vực", "nặng nhọc, độc hại, nguy hiểm"];
        sort($types);

        $today = Carbon::now();

        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'pc_ma'      => $i,
                'pc_ten'     => $types[$i-1],
                'pc_heSoPhuCap'=> $faker->randomFloat(1, 0 , 2),
                'pc_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'pc_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('phucap')->insert($list);
    }
}
