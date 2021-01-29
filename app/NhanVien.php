<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    const CREATED_AT = 'nv_taoMoi';
    const UPDATED_AT = 'nv_capNhat';

    protected   $table          = 'nhanvien';
    protected   $fillable       = ['nv_hoTen', 'nv_cmndNgayCap', 'nv_tenGoiKhac', 'nv_trinhDoChuyenMon', 'nv_ngaySinh', 'dt_ma', 'tg_ma', 'nv_hoKhauThuongTru', 'nv_noiOHienNay', 'nv_ngayVaoDang', 'nv_ngayVaoDangChinhThuc', 'nv_ngayNhapNgu', 'nv_ngayXuatNgu', 'nv_quanHam', 'nv_sucKhoe', 'nv_chieuCao', 'nv_canNang', 'nm_ma', 'nv_hangThuongBinh', 'nv_giaDinhChinhSach', 'nv_cmnd', 'nv_bhxh', 'td_ma', 'username', 'password', 'nv_taoMoi', 'nv_capNhat', 'nv_anh', 'cvu_ma', 'nv_gioiTinh', 'nv_sdt', 'nv_email'];
    protected   $guarded        = ['nv_ma'];

    protected   $primaryKey     = 'nv_ma';
    public      $incrementing   = false;

    protected   $dates            = ['nv_taoMoi', 'nv_capNhat', 'nv_cmndNgayCap', 'nv_ngaySinh', 'nv_ngayVaoDang', 'nv_ngayVaoDangChinhThuc', 'nv_ngayNhapNgu', 'nv_ngayXuatNgu'];
    protected   $dateFormat       = 'Y-m-d H:i:s';

    public function chucVu(){
        return $this->belongsTo('App\ChucVu', 'cvu_ma', 'cvu_ma');
    }
    public function danToc(){
        return $this->belongsTo('App\DanToc', 'dt_ma', 'dt_ma');
    }
    public function tonGiao(){
        return $this->belongsTo('App\TonGiao', 'tg_ma', 'tg_ma');
    }
    public function nhomMau(){
        return $this->belongsTo('App\NhomMau', 'nm_ma', 'nm_ma');
    }
    public function trinhDo(){
        return $this->belongsTo('App\TrinhDo', 'td_ma', 'td_ma');
    }

    public function dsKhenThuong(){
        return $this->hasMany('App\KhenThuong', 'nv_ma', 'nv_ma');
    }
    public function dsKyLuat(){
        return $this->hasMany('App\KyLuat', 'nv_ma', 'nv_ma');
    }
    public function queQuan(){
        return $this->hasMany('App\QueQuan', 'nv_ma', 'nv_ma');
    }
    public function userQuyen(){
        return $this->belongsTo('App\UserQuyen', 'nv_ma', 'nv_ma');
    }
    public function userRole(){
        return $this->belongsTo('App\Role', 'nv_ma', 'nv_ma');
    }
    public function tuyenDung(){
        return $this->hasMany('App\TuyenDung', 'nv_ma', 'nv_ma');
    }
    public function dsQuaTrinhCongTac(){
        return $this->hasMany('App\QuaTrinhCongTac', 'nv_ma', 'nv_ma');
    }
    public function luong(){
        return $this->hasMany('App\Luong', 'nv_ma', 'nv_ma');
    }
    public function lichSuBanThan(){
        return $this->hasMany('App\LichSuBanThan', 'nv_ma', 'nv_ma');
    }
    public function dsQuanHeGiaDinh(){
        return $this->hasMany('App\QuanHeGiaDinh', 'nv_ma', 'nv_ma');
    }
    public function dsVBCC(){
        return $this->hasMany('App\VBCC', 'nv_ma', 'nv_ma');
    }
    public function noiSinh(){
        return $this->hasMany('App\NoiSinh', 'nv_ma', 'nv_ma');
    }
}
