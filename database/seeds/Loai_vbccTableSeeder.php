<?php

use Illuminate\Database\Seeder;

class Loai_vbccTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = ['Bằng tốt nghiệp trung học cơ sở', 'Bằng tốt nghiệp trung học phổ thông', 'Bằng tốt nghiệp trung cấp', 'Bằng tốt nghiệp cao đẳng', 'Bằng cử nhân', 'Bằng thạc sĩ', 'Bằng tiến sĩ và văn bằng trình độ tương đương','Giấy công nhận'];
        for($i=1;$i<=count($types);$i++){
            array_push($list, [
                'loaiVBCC_ma'   => $i,
                'loaiVBCC_ten'  => $types[$i-1] 
            ]);
        }
        DB::table('loai_vbcc')->insert($list);
    }
}
