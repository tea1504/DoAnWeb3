<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('nv_ma', 10)
                    ->primary();
            $table->string('nv_hoTen', 50);
            $table->string('nv_tenGoiKhac', 50)->nullable();
            $table->string('nv_trinhDoChuyenMon')->nullable();
            $table->date('nv_ngaySinh');
            $table->unsignedTinyInteger('dt_ma');
            $table->unsignedTinyInteger('tg_ma');
            $table->string('nv_hoKhauThuongTru', 200);
            $table->string('nv_noiOHienNay', 200);
            $table->date('nv_ngayVaoDang')->nullable();
            $table->date('nv_ngayVaoDangChinhThuc')->nullable();
            $table->date('nv_ngayNhapNgu')->nullable();
            $table->date('nv_ngayXuatNgu')->nullable();
            $table->string('nv_quanHam', 100)->nullable();
            $table->string('nv_sucKhoe', 100)->nullable();
            $table->decimal('nv_chieuCao', 3, 2);
            $table->decimal('nv_canNang', 5, 2);
            $table->unsignedTinyInteger('nm_ma');
            $table->string('nv_hangThuongBinh', 100);
            $table->string('nv_giaDinhChinhSach', 100)->nullable();
            $table->string('nv_cmnd', 20);
            $table->date('nv_cmndNgayCap');
            $table->string('nv_bhxh', 20);
            $table->unsignedTinyInteger('td_ma');
            $table->string('username', 50)
                    ->unique();
            $table->string('password', 100);
            $table->string('nv_sdt', 12);
            $table->string('nv_email', 200);
            $table->unsignedInteger('role_ma');
            $table->timestamp('nv_taoMoi') 
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('nv_capNhat') 
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            
            $table->foreign('dt_ma')
                    ->references('dt_ma')
                    ->on('dantoc')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('tg_ma')
                    ->references('tg_ma')
                    ->on('tongiao')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('td_ma')
                ->references('td_ma')
                    ->on('trinhdo')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('nm_ma')
                    ->references('nm_ma')
                    ->on('nhommau')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('role_ma')
                    ->references('role_ma')
                    ->on('role')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
