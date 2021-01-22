<?php

use Illuminate\Database\Seeder;

class QuanHeGiaDinhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $faker    = Faker\Factory::create('vi_VN');
        $types = [
            [0,'Nguyễn Văn A','Ông nội','1915','Cần Thơ'],
            [1,'Nguyễn Văn Tiến','Cha','1946','Cần Thơ'],
            [2,'Đỗ Thị Quyên','Mẹ','1950','Long Xuyên'],
            [3,'Nguyễn Văn B','Chú','1947','Cần Thơ'],
            [4,'Dương Thị Trang','Bà nội','1917','Vĩnh Long'],
            
        ];
        
        //sort($types);

        $today = new DateTime('2020-12-20 08:00:00');

        for ($i=0; $i < count($types); $i++) {
            array_push($list, [
                'qhgd_ma' => $types[$i][0] ,
                //'nv_ma' => $faker->numberBetween(1, 9),
                'qhgd_ten' => $types[$i][1],
                'qhgd_moiQuanHe' => $types[$i][2],
                'qhgd_namSinh' => $types[$i][3],
                'qhgd_diaChi' => $types[$i][4],
                'qhgd_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'qhgd_capNhat' => $today->format('Y-m-d H:i:s'),
                'qhgd_capNhat' => $faker->numberBetween(1, 9)
            ]);
        }
        DB::table('quanhegiadinh')->insert($list);
    }
}
