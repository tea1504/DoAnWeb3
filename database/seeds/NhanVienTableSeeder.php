<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class NhanVienTableSeeder extends Seeder
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
        $faker = Faker\Factory::create('vi_VN');
        $trinhdo = ['Kỹ sư Công nghệ thông tin', 'Cử nhân Kinh tế', 'Cử nhân Luật hành chính', 'Cử nhân Toán ứng dụng', 'Cử nhân kế toán', 'Kỹ sư Quản lý công nghiệp', ''];
        $today = new DateTime();
        $aDate = null;
        for ($i = 1; $i <= 20; $i++) {
            $percent = $faker->numberBetween(1, 100);

            // tao ma can bo
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100 )
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';

            //random chức vụ
            if ($percent <= 60) {
                $cv = 4;
            } else if ($percent <= 90) {
                $cv = 3;
            } else if ($percent <= 95) {
                $cv = 2;
            } else {
                $cv = 1;
            }

            $percent = $faker->numberBetween(1, 100);

            //random gioi tinh
            if ($percent <= 50) {
                $gt = 1; //Nam
                $name = $uFN->FullNames(VnBase::VnMale, 1)[0];
            } else {
                $gt = 0; //Nu
                $name = $uFN->FullNames(VnBase::VnFemale, 1)[0];
            }

            //random Ngày vào Đảng
            $day_ns = $faker->date($format = 'Y-m-d', $max = '-25 years');
            $day_seed = strtotime('+18 year', strtotime($day_ns));
            $day_seed = date('Y-m-j', $day_seed);
            $day_vd = $faker->date($format = 'Y-m-d', $max = '-1 years');

            $day_vdct = strtotime('+1 year', strtotime($day_vd));
            $day_vdct = date('Y-m-j', $day_vdct);
            $day_nn = $faker->date($format = 'Y-m-d', $max = '-2 years');
            $day_xn = strtotime('+2 year', strtotime($day_nn));
            $day_xn = date('Y-m-j', $day_xn);
            array_push($list, [
                'nv_ma' => $ma . $i,
                'nv_hoTen' => $name,
                'nv_tenGoiKhac' => $name,
                'nv_trinhDoChuyenMon' => $trinhdo[$faker->numberBetween(0, 6)],
                'nv_ngaySinh' => $day_ns,
                'nv_noiSinh' => $faker->numberBetween(1, 5),
                'dt_ma' => $faker->numberBetween(1, 4),
                'tg_ma' => $faker->numberBetween(1, 9),
                'nv_hoKhauThuongTru' => $uPI->Address(),
                'nv_noiOHienNay' => $uPI->Address(),
                'nv_ngayVaoDang' => $day_vd,
                'nv_ngayVaoDangChinhThuc' => $day_vdct,
                'nv_ngayNhapNgu' => $day_nn,
                'nv_ngayXuatNgu' => $day_xn,
                'nv_quanHam' => 'Binh nhất',
                'nv_sucKhoe' => 'Tốt',
                'nv_chieuCao' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1.5, $max = 2),
                'nv_canNang' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 70),
                'nm_ma' => $faker->numberBetween(1, 4),
                'nv_giaDinhChinhSach' => $faker->numberBetween(0, 1),
                'nv_cmnd' => $faker->numberBetween(100000000000, 999999999999),
                'nv_bhxh' => $faker->numberBetween(1000000000, 9999999999),
                'td_ma' => 1,
                'username' => 'user' . $i,
                'password' => bcrypt('12345'),
                'nv_taoMoi' => $today->format('Y-m-d H:i:s'),
                'nv_capNhat' => $today->format('Y-m-d H:i:s'),
                'nv_anh' => 'user' . $i . '.png',
                'cvu_ma' => $cv,
                'nv_gioiTinh' => $gt
            ]);
        }
        DB::table('nhanvien')->insert($list);
    }
}
