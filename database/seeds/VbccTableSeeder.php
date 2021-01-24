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
        $truongPT = ["Trường THPT Lê Hồng Phong", "Trường THPT Năng khiếu Hà Tĩnh", "Trường THPT Chuyên Thái Bình", "Trường THPT Hà Nội – Amsterdam", 'Trường THPT Nguyễn Trãi', 'Trường THPT Trần Đại Nghĩa', "Trường THPT Chu Văn An", "Trường THPT Quốc Học", "Trường THPT Nguyễn Thượng Hiền", "Trường THPT Kim Liên", "Trường THPT Thăng Long", "Trường THPT Giao Thủy A", "Trường THPT Bùi Thị Xuân"];
        $truongDH = ["Đại học Bách khoa Hà Nội", "Học viện Nông nghiệp Việt Nam", "Đại học Cần Thơ", "Đại học Sư phạm Hà Nội", "Đại học Mỏ – Địa chất", "Đại học Thái Nguyên", "Đại học Bách khoa TP HCM", "Đại học Nông Lâm TP HCM", "Đại học Tôn Đức Thắng", "Đại học Huế", "Đại học Đà Nẵng", "Đại học Trà Vinh", "Học viện Công nghệ Bưu chính Viễn thông", "Đại học Giao thông Vận tải", "Đại học Vinh", "Đại học Quy Nhơn", "Đại học Quy Nhơn", "Đại học Kinh tế TP HCM", "Đại hoc Duy Tân", "Đại học FPT"];
        $nganhdh = ["Cử nhân luật", "Cử nhân marketing", "Cử nhân quản trị kinh doanh", "Kỹ sư khoa học cây trồng", "Cử nhân ngôn ngữ anh", "Kỹ sư quản lý công nghiệp", "Kỹ sư công nghệ thông tin", "Xã hội học", "Thông tin thư viện"];
        $hinhthuc = ['chính quy', 'vừa học vừa làm', 'tại chức', 'chuyên tu', 'bồi dưỡng'];
        $nganhths = ["Thạc sĩ luật kinh tế", "Thạc sĩ khoa học máy tính", "Thạc sĩ văn học Việt Nam", "Thạc sĩ kinh tế học", "Thạc sĩ quản trị kinh doanh", "Thạc sĩ quản lý kinh tế"];
        $nn = [
            ['Tiếng Anh VSTEP', 'Tiếng Anh IELTS', 'Tiếng Anh TOEIC', 'Tiếng Anh TOEFL iBT'],
            ['Tiếng Nhật JLPT', 'Tiếng Nhật Na-Test', 'Tiếng Nhật Top J', 'Tiếng Nhật BJT'],
            ['Tiếng Trung Bằng Quốc Gia', 'Tiếng Trung HSK', 'Tiếng Trung TOCFL', 'Tiếng Trung HSKK']
        ];
        $nn_td = [
            [
                ['B1', 'B2', 'C1'],
                ['5', '5,5', '6'],
                ['500', '550', '670'],
                ['46', '59', '79']
            ],
            [
                ['N3', 'N2', 'N1'],
                ['N3', 'N2', 'N1'],
                ['Sơ cấp', 'Trung cấp', 'Cao cấp'],
                ['J3', 'J2', 'J1']
            ],
            [
                ['A', 'B', 'C'],
                ['HKS3', 'HKS4', 'HKS5'],
                ['Cấp 3', 'Cấp 4', 'Cấp 5'],
                ['Sơ cấp', 'Trung cấp', 'Cao cấp']
            ]
        ];
        $th = ['Chứng chỉ ứng dụng Công nghệ thông tin cơ bản', 'Chứng chỉ ứng dụng Công nghệ thông tin nâng cao', 'MOS'];
        $th_td = ['Specialist', 'Expert', 'Master'];
        $k = 1;
        for ($i = 1; $i <= 20; $i++) {
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100)
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';

            $day_ns = (int)$faker->year($max = '-25 years');

            array_push($list, [
                'vbcc_ma' => $k++,
                'nv_ma' => $ma . $i,
                'vbcc_ten' => "Tốt nghiệp THPT",
                'lvbcc_ma' => 1,
                'vbcc_trinhDo' => '',
                'vbcc_tuNgay' => '8/' . ($day_ns + 15),
                'vbcc_denNgay' => '5/' . ($day_ns + 18),
                'vbcc_tenTruong' => $truongPT[$faker->numberBetween(0, count($truongPT) - 1)],
                'vbcc_hinhThuc' => 'chính quy'
            ]);
            $t = $day_ns + $faker->numberBetween(18, 20);
            array_push($list, [
                'vbcc_ma' => $k++,
                'nv_ma' => $ma . $i,
                'vbcc_ten' => $nganhdh[$faker->numberBetween(0, count($nganhdh) - 1)],
                'lvbcc_ma' => 1,
                'vbcc_trinhDo' => '',
                'vbcc_tuNgay' => '9/' . $t,
                'vbcc_denNgay' => '6/' . ($t + 4),
                'vbcc_tenTruong' => $truongDH[$faker->numberBetween(0, count($truongDH) - 1)],
                'vbcc_hinhThuc' => $hinhthuc[$faker->numberBetween(0, count($hinhthuc) - 1)]
            ]);
            if ($faker->numberBetween(1, 30) <= 10) {
                $t = $day_ns + $faker->numberBetween(25, 30);
                array_push($list, [
                    'vbcc_ma' => $k++,
                    'nv_ma' => $ma . $i,
                    'vbcc_ten' => $nganhths[$faker->numberBetween(0, count($nganhths) - 1)],
                    'lvbcc_ma' => 1,
                    'vbcc_trinhDo' => '',
                    'vbcc_tuNgay' => '7/' . $t,
                    'vbcc_denNgay' => '4/' . ($t + 2),
                    'vbcc_tenTruong' => $truongDH[$faker->numberBetween(0, count($truongDH) - 1)],
                    'vbcc_hinhThuc' => $hinhthuc[$faker->numberBetween(0, count($hinhthuc) - 1)]
                ]);
            }
            $t = $day_ns + $faker->numberBetween(18, 25);
            $l = $faker->numberBetween(0, 2);
            if ($l == 2) {
                array_push($list, [
                    'vbcc_ma' => $k++,
                    'nv_ma' => $ma . $i,
                    'vbcc_ten' => $th[$l],
                    'lvbcc_ma' => 2,
                    'vbcc_trinhDo' => $th_td[$faker->numberBetween(0, count($th_td)-1)],
                    'vbcc_tuNgay' => '5/' . $t,
                    'vbcc_denNgay' => '7/' . $t,
                    'vbcc_tenTruong' => $truongDH[$faker->numberBetween(0, count($truongDH) - 1)],
                    'vbcc_hinhThuc' => ""
                ]);
            } else
            array_push($list, [
                'vbcc_ma' => $k++,
                'nv_ma' => $ma . $i,
                'vbcc_ten' => $th[$l],
                'lvbcc_ma' => 2,
                'vbcc_trinhDo' => "",
                'vbcc_tuNgay' => '5/' . $t,
                'vbcc_denNgay' => '7/' . $t,
                'vbcc_tenTruong' => $truongDH[$faker->numberBetween(0, count($truongDH) - 1)],
                'vbcc_hinhThuc' => ""
            ]);
            if($faker->numberBetween(1, 100) > 33){ //Xac suat có bang nn la 2/3
                $t = $day_ns + $faker->numberBetween(18, 25);
                $a = $faker->numberBetween(0, 2); //Loại nn
                $b = $faker->numberBetween(0, 3); //Loai bang
                $c = $faker->numberBetween(0, 2); //trinh do
                array_push($list, [
                    'vbcc_ma' => $k++,
                    'nv_ma' => $ma . $i,
                    'vbcc_ten' => $nn[$a][$b],
                    'lvbcc_ma' => 3,
                    'vbcc_trinhDo' => $nn_td[$a][$b][$c],
                    'vbcc_tuNgay' => '5/' . $t,
                    'vbcc_denNgay' => '7/' . $t,
                    'vbcc_tenTruong' => $truongDH[$faker->numberBetween(0, count($truongDH) - 1)],
                    'vbcc_hinhThuc' => ""
                ]); 
            }
            if($faker->numberBetween(1, 100) >= 75){ // 25% có bang
                $t = $day_ns + $faker->numberBetween(25, 40);
                $arr2=['Chuyên viên cao cấp', 'chuyên viên chính', 'chuyên viên', 'chuyên viên', 'chuyên viên', 'chuyên viên', 'chuyên viên', 'cán sự', 'cán sự', 'cán sự', 'cán sự', 'cán sự', 'cán sự', 'cán sự', 'cán sự', 'cán sự', 'cán sự', 'cán sự'];
                array_push($list, [
                    'vbcc_ma' => $k++,
                    'nv_ma' => $ma . $i,
                    'vbcc_ten' => 'chứng chỉ quản lý nhà nước ngạch chuyên viên',
                    'lvbcc_ma' => 5,
                    'vbcc_trinhDo' => $arr2[$faker->numberBetween(0, count($arr2) - 1)],
                    'vbcc_tuNgay' => '5/' . $t,
                    'vbcc_denNgay' => '7/' . $t,
                    'vbcc_tenTruong' => $truongDH[$faker->numberBetween(0, count($truongDH) - 1)],
                    'vbcc_hinhThuc' => ""
                ]); 
            }
        }
        DB::table('vanbang_chungchi')->insert($list);
    }
}
