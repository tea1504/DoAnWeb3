<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhenthuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khenthuong', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('kt_ma')
                    ->autoIncrement();
            $table->string('nv_ma', 10);
            $table->date('kt_ngayKy');
            $table->string('kt_nguoiKy', 10);
            $table->text('kt_lyDo');
            $table->timestamp('kt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('nv_ma')
                    ->references('nv_ma')
                    ->on('nhanvien')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('kt_nguoiKy')
                    ->references('nv_ma')
                    ->on('nhanvien')
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
        Schema::dropIfExists('khenthuong');
    }
}
