<?php

use App\Role;
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
        $trinhdo = ['Kỹ sư Công nghệ thông tin', 'Cử nhân Kinh tế', 'Cử nhân Luật hành chính', 'Cử nhân Toán ứng dụng', 'Cử nhân kế toán', 'Kỹ sư Quản lý công nghiệp'];
        $gdcs = ['Con thương binh', 'Con liệt sĩ', 'Người nhiễm chất độc da cam Dioxin'];
        $today = new DateTime();
        for ($i = 2; $i <= 20; $i++) {
            $percent = $faker->numberBetween(1, 100);

            // tao ma can bo
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100)
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';


            $percent = $faker->numberBetween(1, 100);

            //random gioi tinh
            if ($percent <= 50) {
                $gt = 1; //Nam
                $name = $uFN->FullNames(VnBase::VnMale, 1)[0];
            } else {
                $gt = 0; //Nu
                $name = $uFN->FullNames(VnBase::VnFemale, 1)[0];
            }
            // random chuc vu va role
            $chucvu = $faker->numberBetween(1, 24);
            if ($chucvu == 24) {
                $role = 1;
            } else if ($chucvu >= 1 && $chucvu < 7) {
                $role = 3;
            } else {
                $role = 2;
            }
            //random Ngày vào Đảng
            $day_ns = $faker->date($format = 'Y-m-d', $max = '-25 years');
            $day_seed = date('Y-m-d H:i:s', strtotime('+18 year', strtotime($day_ns)));
            $day_vd = date('Y-m-d H:i:s', strtotime('+' . $faker->numberBetween(0, 2020 - getdate(strtotime($day_seed))['year']) . ' year +' . $faker->numberBetween(0, 12) . ' month +' . $faker->numberBetween(0, 31) . ' day', strtotime($day_seed)));
            $day_vdct = date('Y-m-d H:i:s', strtotime('+1 year', strtotime($day_vd)));
            $day_nn = date('Y-m-d H:i:s', strtotime('+' . $faker->numberBetween(0, 2019 - getdate(strtotime($day_seed))['year']) . ' year +' . $faker->numberBetween(0, 12) . ' month +' . $faker->numberBetween(0, 31) . ' day', strtotime($day_seed)));
            $day_xn = date('Y-m-d H:i:s', strtotime('+2 year', strtotime($day_nn)));

            $chinhsach = '';
            if($faker->numberBetween(1,100)==50)
                $chinhsach = $gdcs[$faker->numberBetween(0, count($gdcs)-1)];
            array_push($list, [
                'nv_ma' => $ma . $i,
                'nv_hoTen' => $name,
                'nv_tenGoiKhac' => $name,
                'nv_trinhDoChuyenMon' => $trinhdo[$faker->numberBetween(0, 5)],
                'nv_ngaySinh' => $day_ns,
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
                'nv_giaDinhChinhSach' => $chinhsach,
                'nv_cmnd' => $faker->numberBetween(100000000000, 999999999999),
                'nv_cmndNgayCap' => $day_seed,
                'nv_bhxh' => $faker->numberBetween(1000000000, 9999999999),
                'td_ma' => 1,
                'username' => 'user' . $i,
                'password' => bcrypt('12345'),
                'nv_taoMoi' => $today->format('Y-m-d H:i:s'),
                'nv_capNhat' => $today->format('Y-m-d H:i:s'),
                'nv_anh' => 'user' . $i . '.png',
                'cvu_ma' => $chucvu,
                'nv_gioiTinh' => $gt,
                'nv_sdt' => '0' . $faker->numberBetween(100000000, 999999999),
                'nv_email' => $faker->email(),
                'role_ma' => $role
            ]);
        }
        //admin
        //random Ngày vào Đảng
        $day_ns = $faker->date($format = 'Y-m-d', $max = '-25 years');
        $day_seed = date('Y-m-d H:i:s', strtotime('+18 year', strtotime($day_ns)));
        $day_vd = date('Y-m-d H:i:s', strtotime('+' . $faker->numberBetween(0, 2020 - getdate(strtotime($day_seed))['year']) . ' year +' . $faker->numberBetween(0, 12) . ' month +' . $faker->numberBetween(0, 31) . ' day', strtotime($day_seed)));
        $day_vdct = date('Y-m-d H:i:s', strtotime('+1 year', strtotime($day_vd)));
        $day_nn = date('Y-m-d H:i:s', strtotime('+' . $faker->numberBetween(0, 2019 - getdate(strtotime($day_seed))['year']) . ' year +' . $faker->numberBetween(0, 12) . ' month +' . $faker->numberBetween(0, 31) . ' day', strtotime($day_seed)));
        $day_xn = date('Y-m-d H:i:s', strtotime('+2 year', strtotime($day_nn)));
        array_push($list, [
            'nv_ma' => 'CB0001',
            'nv_hoTen' => 'Quản trị hệ thống',
            'nv_tenGoiKhac' => 'Admin',
            'nv_trinhDoChuyenMon' => $trinhdo[0],
            'nv_ngaySinh' => $day_ns,
            'dt_ma' => 1,
            'tg_ma' => 1,
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
            'nv_giaDinhChinhSach' => "",
            'nv_cmnd' => $faker->numberBetween(100000000000, 999999999999),
            'nv_cmndNgayCap' => $day_seed,
            'nv_bhxh' => $faker->numberBetween(1000000000, 9999999999),
            'td_ma' => 1,
            'username' => 'Admin',
            'password' => bcrypt('12345'),
            'nv_taoMoi' => $today->format('Y-m-d H:i:s'),
            'nv_capNhat' => $today->format('Y-m-d H:i:s'),
            'nv_anh' => 'user1.png',
            'cvu_ma' => 24,
            'nv_gioiTinh' => 1,
            'nv_sdt' => '0786882852',
            'nv_email' => 'qlnhanluc@gmail.com',
            'role_ma' => 1
        ]);
        DB::table('nhanvien')->insert($list);
    }
}
