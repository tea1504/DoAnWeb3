<?php

use Illuminate\Database\Seeder;

class DonViQuanLyTableSeeder extends Seeder
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
            'Viện Hàn lâm Khoa học Xã hội Việt Nam',
            'Viện Hàn lâm Khoa học và Công nghệ Việt Nam',
            'Thông tấn xã Việt Nam',
            'Đài Tiếng nói Việt Nam',
            'Đài Truyền hình Việt Nam',
            'Bảo hiểm Xã hội Việt Nam'
        ];
        for ($i = 0; $i < count($types); $i++) {
            array_push($list, [
                'dvql_ma'     =>  $i + 1,
                'dvql_ten'    =>  $types[$i]
            ]);
        }
        DB::table('donviquanly')->insert($list);
    }
}
