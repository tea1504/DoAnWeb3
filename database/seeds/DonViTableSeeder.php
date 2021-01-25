<?php

use Illuminate\Database\Seeder;

class DonViTableSeeder extends Seeder
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
            [
                'Bảo tàng Dân tộc học Việt Nam',
                'Tạp chí Khoa học xã hội Việt Nam',
                'Học viện Khoa học xã hội'
            ],
            [
                'Viện Toán học',
                'Viện Công nghệ thông tin',
                'Viện Vật lý'
            ],
            [
                'Ban Tổ chức - Cán bộ',
                'Ban Kế hoạch - Tài chính',
                'Ban Kiểm tra'
            ],
            [
                'Ban Tổ chức Cán bộ',
                'Ban Kế hoạch - Tài chính',
                'Ban hợp tác quốc tế'
            ],
            [
                'Ban Tổ chức Cán bộ',
                'Ban Kế hoạch - Tài chính',
                'Ban hợp tác quốc tế'
            ],
            [
                'Ban Tổ chức cán bộ',
                'Báo BHXH',
                'Tạp chí BHXH'
            ]
        ];
        $k = 1;
        for ($i = 0; $i < count($types); $i++) {
            for($j=0; $j<count($types[$i]); $j++){
                array_push($list, [
                    'dv_ma'     =>  $k++,
                    'dv_ten'    =>  $types[$i][$j],
                    'dvql_ma' =>  $i + 1
                ]);
            }
        }
        DB::table('donvi')->insert($list);
    }
}
