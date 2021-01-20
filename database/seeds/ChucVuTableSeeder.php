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
            [1,'Giám đốc','Người đứng đầu công ti'],
            [2,'Phó giám đốc','Người hộ trợ trực tiếp cho giám đốc'],
            [3,'Trưởng phòng','Người quản lý một phòng ban'],
            [4,'Nhân viên','Người trực tiếp thực hiện công việc']
        ];
        //sort($types);

        $today = new DateTime('2020-12-20 08:00:00');

        for ($i=0; $i < count($types); $i++) {
            array_push($list, [
                'cvu_ma'      => $types[$i][0],
                'cvu_ten'     => $types[$i][1],
                'cvu_moTa'     => $types[$i][2],
                'cvu_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'cvu_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('chucvu')->insert($list);
    }
}
