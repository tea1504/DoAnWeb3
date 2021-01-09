# Thông tin về Tác giả
D20197 - Trần Văn Hòa <br>
D20208 - Dương Thị Tường Vy<br>
D20209 - Đỗ Nguyễn Duy Linh

# Hướng dẫn cách sử dụng dự án
## Step 1: Clone source dự án
Thực thi câu lệnh sau:
```
git clone https://github.com/tea1504/DoAnWeb3.git
```

## Step 2: Khởi tạo, kết nối database
Hiệu chỉnh file .env. Nếu chưa có thì copy file .env.example ra file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbnhanluc
DB_USERNAME=root
DB_PASSWORD=
```
- Nếu chưa có key thì chạy câu lệnh
```
php artisan key:generate
```

## Step 3: Tạo database, thực hiện migrate
- Tạo database <tengido>, chuẩn bảng mã `utf8mb4_unicode_ci`
- Thực thi câu lệnh khởi tạo cấu trúc bảng
```
php artisan migrate
```

## Step 4: tạo dữ liệu mẫu
- Thực thi câu lệnh
```
php artisan db:seed
```

## Step 5: tạo domain ảo
- Tạo domain ảo với qlnhanluc.local

## Step 6: thông tin tài khoản truy cập hệ thống
Tài khoản Admin:
admin / admin

Tài khoản Nhân viên:
nhanvien / 123456
...
