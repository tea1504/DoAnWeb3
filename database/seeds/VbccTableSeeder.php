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
        $th = ['Chứng chỉ ứng dụng Công nghệ thông tin cơ bản','Chứng chỉ ứng dụng Công nghệ thông tin nâng cao','MOS'];
        $th_td = ['Specialist','Expert','Master'];
        
        $types = ['Kỹ sư Công nghệ thông tin', 'Cử nhân Kinh tế', 'Cử nhân Luật hành chính', 'Cử nhân Toán ứng dụng', 'Cử nhân kế toán', 'Kỹ sư Quản lý công nghiệp'];

        $k=1;
        for ($i=1; $i <= 20; $i++) {
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100 )
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';
            //Bang tot nghiep
            array_push($list, [
                'vbcc_ma' => $k++,
                'nv_ma' => $ma . $i,
                'vbcc_ten' => 'Tốt nghiệp THPT',
                'vbcc_trinhDo' => '',
                'vbcc_ngayCap' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-25 years', $timezone = null)
            ]);
            //Bang ngoai ngu
            if($faker->numberBetween(0, 2) > 0){
                $arr = [];
                for($j=0; $j<2; $j++) array_push($arr,$faker->numberBetween(0, 2));
                $arr = array_unique($arr);
                foreach($arr as $a){
                    $t = $faker->numberBetween(0, 3);
                    array_push($list, [
                        'vbcc_ma' => $k++,
                        'nv_ma' => $ma . $i,
                        'vbcc_ten' => $nn[$a][$t],
                        'vbcc_trinhDo' => $nn_td[$a][$t][$faker->numberBetween(0, 2)],
                        'vbcc_ngayCap' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null)
                    ]);
                }
            }
            //Bang tin hoc
            if($faker->numberBetween(0, 2) > 0){
                $t = $faker->numberBetween(0, 2);
                if($t == 2){
                    array_push($list, [
                        'vbcc_ma' => $k++,
                        'nv_ma' => $ma . $i,
                        'vbcc_ten' => $th[$t],
                        'vbcc_trinhDo' => $th_td[$faker->numberBetween(0, 2)],
                        'vbcc_ngayCap' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null)
                    ]);
                }
                else
                    array_push($list, [
                        'vbcc_ma' => $k++,
                        'nv_ma' => $ma . $i,
                        'vbcc_ten' => $th[$t],
                        'vbcc_trinhDo' => '',
                        'vbcc_ngayCap' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null)
                    ]);
            }
            array_push($list, [
                'vbcc_ma' => $k++,
                'nv_ma' => $ma . $i,
                'vbcc_ten' => $types[$faker->numberBetween(0, 5)],
                'vbcc_trinhDo' => '',
                'vbcc_ngayCap' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null)
            ]);
        }
        DB::table('vanbang_chungchi')->insert($list);
    }
}
