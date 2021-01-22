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
        $this->call(DanTocTableSeeder::class);
        $this->call(TonGiaoTableSeeder::class);
        $this->call(NhomMauTableSeeder::class);
        $this->call(TrinhDoTableSeeder::class);
        $this->call(TinhTableSeeder::class);
        $this->call(HuyenTableSeeder::class);
        $this->call(XaTableSeeder::class);
        $this->call(ChucVuTableSeeder::class);
        $this->call(NhanVienTableSeeder::class);
        $this->call(NgachTableSeeder::class);
        $this->call(BacTableSeeder::class);
        $this->call(NgachBacTableSeeder::class);
        $this->call(PhuCapTableSeeder::class);
        $this->call(LuongTableSeeder::class);
    }
}
