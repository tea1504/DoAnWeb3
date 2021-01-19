<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    const CREATED_AT = 'nv_taoMoi';
    const UPDATED_AT = 'nv_capNhat';

    protected   $table          = 'nhanvien';
    protected   $fillable       = ['nv_hoTen', 'nv_tenGoiKhac', 'cvu_ma', 'nv_ngaySinh', 'nv_noiSinh', 'dt_ma', 'tg_ma', 'nv_hoKhauThuongTru', 'nv_noiOHienNay', 'nv_ngayVaoDang', 'nv_ngayVaoDangChinhThuc', 'nv_ngayNhapNgu', 'nv_ngayXuatNgu', 'nv_quanHam', 'nv_sucKhoe', 'nv_chieuCao', 'nv_canNang', 'nm_ma', 'nv_hangThuongBinh', 'nv_giaDinhChinhSach', 'nv_cmnd', 'nv_bhxh', 'td_ma', 'username', 'password', 'nv_taoMoi', 'nv_capNhat', 'nv_anh'];
    protected   $guarded        = ['nv_ma'];

    protected   $primaryKey     = 'nv_ma';

    protected   $dates            = ['nv_taoMoi', 'nv_capNhat', 'nv_ngaySinh', 'nv_ngayVaoDang', 'nv_ngayVaoDangChinhThuc', 'nv_ngayNhapNgu', 'nv_ngayXuatNgu'];
    protected   $dateFormat       = 'Y-m-d H:i:s';

    public function chucVu(){
        return $this->belongsTo('App\ChucVu', 'cvu_ma', 'cvu_ma');
    }
    public function noiSinh(){
        return $this->belongsTo('App\Tinh', 'nv_noiSinh', 't_ma');
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
    //user-role
    //user-quyen
    public function tuyenDung(){
        return $this->hasMany('App\QueQuan', 'nv_ma', 'nv_ma');
    }
    //qua trinh cong tac
    //luong
    public function lichSuBanThan(){
        return $this->hasMany('App\LichSuBanThan', 'nv_ma', 'nv_ma');
    }
    public function dsQuanHeGiaDinh(){
        return $this->hasMany('App\QuanHeGiaDinh', 'nv_ma', 'nv_ma');
    }
    public function dsVBCC(){
        return $this->hasMany('App\VBCC', 'nv_ma', 'nv_ma');
    }
}
