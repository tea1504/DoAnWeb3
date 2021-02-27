<?php

use Illuminate\Database\Seeder;

class NoiSinhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ["Nguyễn Văn Linh", "Đường 3/2", "Phạm Văn Bạch", "Dương Văn Dương", "Lê Văn Thọ", "Cầu Xéo", "Nguyễn Văn Cừ", "Tỉnh lộ 921", "Bùi Viện", "Cách Mạng Tháng 8", "Đề Thám", "Mậu Thân", "Trần Hưng Đạo", "Ngô Quyền", "Hùng Vương", "Đại lộ Hòa Bình", "Huỳnh Thúc Kháng", "Lê Lai", "Lê Lợi"];
        $faker = Faker\Factory::create('vi_VN');
        for($i=1; $i<=40; $i++){
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100 )
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';
            $t = $faker->numberBetween(1, 5);
            switch ($t) {
                case 1:
                    $h = $faker->numberBetween(1, 5);
                    break;
                case 2:
                    $h = $faker->numberBetween(6, 8);
                    break;
                case 3:
                    $h = $faker->numberBetween(9, 10);
                    break;
                case 4:
                    $h = $faker->numberBetween(11, 13);
                    break;
                case 5:
                    $h = $faker->numberBetween(14, 16);
                    break;
            }
            $x = $h*2 - $faker->numberBetween(0, 1);
            $dc = '';
            $seed = $faker->numberBetween(1, 100);
            if($seed >= 1 && $seed <= 33){
                $dc = $faker->numberBetween(10, 1000).' '.$types[$faker->numberBetween(0, count($types)-1)];
            }
            else if($seed >= 34 && $seed <= 37){
                $dc = $faker->numberBetween(10, 1000).'/'.$faker->numberBetween(10, 1000).' '.$types[$faker->numberBetween(0, count($types)-1)];
            }
            else{
                if($faker->numberBetween(0, 1)==1)
                    $dc = $faker->numberBetween(10, 1000).'A '.$types[$faker->numberBetween(0, count($types)-1)];
                else
                    $dc = $faker->numberBetween(10, 1000).'B '.$types[$faker->numberBetween(0, count($types)-1)];
            }
            array_push($list,[
                'ns_ma' => $i,
                'nv_ma' => $ma.$i,
                'x_ma' => $x,
                'h_ma' => $h,
                't_ma' => $t,
                'ns_diaChi' => $dc
            ]);
        }
        DB::table('noisinh')->insert($list);
    }
}
