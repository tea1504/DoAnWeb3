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
        $types = [
            [0,'Hành hung người vô tội','Mặt trận Tổ quốc Việt Nam'],
            [1,'Cản trở người thi hành công vụ','Công đoàn Việt Nam'],
            [2,'Buôn bán ma túy','Đoàn thanh niên cộng sản Hồ Chí Minh'],
            [3,'Gây mất trật tự nơi công cộng','Hội cựu chiến binh Việt Nam'],
        ];

        for ($i=0; $i < count($types); $i++) {
            array_push($list, [
                'lsbt_ma' => $types[$i][0] ,
                //'nv_ma' => $faker->numberBetween(1, 9),
                'lsbt_hanhViPhamToi' => $types[$i][1],
                'lsbt_thamGiaToChucChinhTri' => $types[$i][2],
                
                
            ]);
        }
        DB::table('lichsubanthan')->insert($list);

    }
}
