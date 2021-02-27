<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

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
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $faker    = Faker\Factory::create('vi_VN');
        $nam = ['Em', 'Anh', 'Cha', 'Chú', 'Bác', 'Ông'];
        $nu  = ['Em', 'Chị', 'Cô' , 'Dì' , 'Mẹ' , 'Bà'];
        $nghe = ['Bác sĩ', 'Nha sĩ', 'Giáo viên', 'Đầu bếp', 'Thợ may', 'Phóng viên', 'Ca sĩ', 'Họa sĩ', 'Cảnh sát', 'Nông dân', 'Tự do', 'Nội trợ'];
        $k=1;
        for ($i=1; $i <= 40; $i++) {
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100 )
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';
            $arr_nam = [];
            $arr_nu = [];
            for($j=1;$j<=3;$j++){
                array_push($arr_nam,$faker->numberBetween(0,5));
                array_push($arr_nu,$faker->numberBetween(0,5));
            }
            $arr_nam = array_unique($arr_nam);
            $arr_nu = array_unique($arr_nu);
            foreach($arr_nam as $n){
                array_push($list, [
                    'qhgd_ma' => $k++,
                    'nv_ma' => $ma . $i,
                    'qhgd_ten' => $uFN->FullNames(VnBase::VnMale, 1)[0],
                    'qhgd_moiQuanHe' => $nam[$n],
                    'qhgd_namSinh' => $faker->year($max = '-25 years'),
                    'qhgd_diaChi' => $uPI->Address(),
                    'qhgd_ngheNghiep' => $nghe[$faker->numberBetween(0, count($nghe)-1)],
                    'qhgd_nuocNgoai' => $faker->numberBetween(0, 1),
                ]);
            }
            foreach($arr_nu as $n){
                array_push($list, [
                    'qhgd_ma' => $k++,
                    'nv_ma' => $ma . $i,
                    'qhgd_ten' => $uFN->FullNames(VnBase::VnFemale, 1)[0],
                    'qhgd_moiQuanHe' => $nu[$n],
                    'qhgd_namSinh' => $faker->year($max = '-25 years'),
                    'qhgd_diaChi' => $uPI->Address(),
                    'qhgd_ngheNghiep' => $nghe[$faker->numberBetween(0, count($nghe)-1)],
                    'qhgd_nuocNgoai' => $faker->numberBetween(1, 100)%3==0?1:0,
                ]);
            }
        }
        DB::table('quanhegiadinh')->insert($list);
    }
}
