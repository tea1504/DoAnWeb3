<?php

use Illuminate\Database\Seeder;
use App\NhanVien;
class UserQuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $list = [];
        $types =24;
        for($i=1; $i<=$types; $i++){
            array_push($list, [
                'nv_ma'     =>  NhanVien::all()->random()->nv_ma, 
                'q_ma'    =>  $faker->numberBetween(1, 7)
            ]);
        }
        DB::table('user_quyen')->insert($list);
    }
}
