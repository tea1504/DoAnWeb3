<?php

use Illuminate\Database\Seeder;

class VbccTableSeeder extends Seeder
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
            [1,'Bằng tốt nghiệp tiểu học','Tiểu học'],
            [2,'Bằng tốt nghiệp trung học cơ sở','Trung học cơ sở'],
            [3,'Bằng tốt nghiệp trung học phổ thông','Trung học phổ thông'],
            [4,'Bẳng tốt nghiệp đại học, cao đẳng, trung cấp','Đại học, cao đẳng, trung cấp'],
            [5,'Bẳng tốt nghiệp cao học','Hạt sĩ, tiến sĩ'],
            [6,'Chứng chỉ anh văn, tin học ','.........'],
        ];
        
        //sort($types);

        $today = new DateTime('2020-12-20 08:00:00');

        for ($i=0; $i < count($types); $i++) {
            array_push($list, [
                'vbcc_ma' => $types[$i][0] ,
                //'nv_ma' => $faker->numberBetween(1, 9),
                'vbcc_ten' => $types[$i][1],
                'loaiVBCC_ma'  => $faker->numberBetween(1, 9),  
                'vbcc_trinhDo' => $types[$i][2],
                'vbcc_ngayCap' => $today->format('Y-m-d H:i:s'),
                'vbcc_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'vbcc_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('vanbang_chungchi')->insert($list);
    }
}
