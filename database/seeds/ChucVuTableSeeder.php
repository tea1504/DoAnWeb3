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
            [3,'Giám đốc điều hành',''],
            [4,'Giám đốc thông tin',''],
            [5,'Trưởng phòng hoạt động',''],
            [6,'Giám đốc tài chính',''],
            [7,'Hội đồng quản trị',''],
            [8,'Cổ đông',''],
            [9,'Thành viên ban quản trị',''],
            [10,'Người sáng lập',''],
            [11, 'Chủ tịch',''],
            [12,'Phó chủ tịch',''],
            [13,'Quản lý',''],
            [14,'Trưởng phòng','Người quản lý một phòng ban'],
            [15,'Trưởng bộ phận',''],
            [16,'Trưởng Nhóm',''],
            [17,'Thư kí',''],
            [18,'Nhân viên','Người trực tiếp thực hiện công việc'],
            [19,'Chuyên viên',''],
            [20,'Cộng tác viên',''],
            [21,'Thực tập sinh',''],
            [22,'Bảo vệ',''],
            [23,'Lao Công','']
        ];

        for ($i=0; $i < count($types); $i++) {
            array_push($list, [
                'cvu_ma'      => $types[$i][0],
                'cvu_ten'     => $types[$i][1],
                'cvu_moTa'     => $types[$i][2]
            ]);
        }
        DB::table('chucvu')->insert($list);
    }
}
