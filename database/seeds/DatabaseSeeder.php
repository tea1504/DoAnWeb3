<?php

use App\Tinh;
use App\TrinhDo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(NhomMauTableSeeder::class);
        $this->call(TrinhDoTableSeeder::class);
        $this->call(TonGiaoTableSeeder::class);
        $this->call(DanTocTableSeeder::class);
        $this->call(CongViecTableSeeder::class);
        $this->call(DonViQuanLyTableSeeder::class);
        $this->call(DonViTableSeeder::class);
        $this->call(ChucVuTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(TinhTableSeeder::class);
        $this->call(HuyenTableSeeder::class);
        $this->call(XaTableSeeder::class);
        $this->call(NhanVienTableSeeder::class);
        $this->call(KyLuatTableSeeder::class);
        $this->call(KhenThuongTableSeeder::class);
        $this->call(TuyenDungTableSeeder::class);
        $this->call(QuanHeGiaDinhTableSeeder::class);
        $this->call(LichSuBanThanTableSeeder::class);
        $this->call(QueQuanTableSeeder::class);
        $this->call(NoiSinhTableSeeder::class);
        $this->call(QuyenTableSeeder::class);
        $this->call(RoleQuyenTableSeeder::class);
        $this->call(NgachTableSeeder::class);
        $this->call(BacTableSeeder::class);
        $this->call(PhuCapTableSeeder::class);
        $this->call(NgachBacTableSeeder::class);
        $this->call(LuongTableSeeder::class);
        $this->call(QuaTrinhCongTacTableSeeder::class);
        $this->call(LoaiVBCCTableSeeder::class);
        $this->call(VbccTableSeeder::class); 
        // $this->call(UserQuyenTableSeeder::class);

    }
}
