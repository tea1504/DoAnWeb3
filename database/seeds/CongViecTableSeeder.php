<?php

use Illuminate\Database\Seeder;

class CongViecTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types =[
            [1,'Lập trình','viết, tạo chương trình'],
            [2,'Thiết kế UX','Tạo giao diện cho khách hàng dễ sử dụng'],
            [3,'Quản lý dự án','Trưởng nhóm, người có trách nhiệm quản cao nhất'],
            [4,'Kiểm thử','Kiểm tra sản phẩm trước khi đưa ra thị trường'],
            [5,'Quan trị hệ thống','Người đảm bảo môi trường phát triển cho nhân viên'],
            [6,'Lễ tân văn phòng','Trả lời điện thoại từ khách hàng, Đón khách thay ban giám đốc, Xử lý thông tin ban đầu và hướng dẫn khách đến bộ phận chức năng.'],
            [7,'Công tác văn thư','Tiếp nhận công văn, văn bản gửi đến công ty, phân loại và gửi đến bộ phận chức năng'],
            [8,'Quản lý cơ sở hạ tầng, trang thiết bị','Theo dõi và quản lý trang thiết bị, tài sản công ty cũng như đặt mua khi cần thiết.'],
            [9,'Hỗ trợ dự án','Hỗ trợ làm hồ sơ cho dự án của công ty'],
            [10,'Chuyên viên tư vấn',''],
            [11,'Kiểm toán, kế toán viên',''],
            [12,'Xây dựng chiến lược kinh doanh',''],
            [13,'Gặp gỡ đối tác kinh doanh',''],
            [14,'Đánh máy, nhập liệu, đăng bài quảng cáo',''],
            [15,'Lãnh đạo',''],
            [16,'Phát triển kinh doanh','']
        ];
        for($i=0;$i<count($types);$i++){
            array_push($list, [
                'cv_ma'   => $types[$i][0],
                'cv_ten'  => $types[$i][1], 
                'cv_moTa'  => $types[$i][2], 
            ]);
        }
        DB::table('congviec')->insert($list);
    }
}
