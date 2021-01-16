<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKyluatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kyluat', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('kl_ma')
                    ->autoIncrement();
            $table->string('nv_ma', 10);
            $table->date('kl_ngayKy');
            $table->string('kl_nguoiKy', 10);
            $table->text('kl_lyDo');
            $table->timestamp('kl_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kl_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('nv_ma')
                    ->references('nv_ma')
                    ->on('nhanvien')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('kl_nguoiKy')
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
        Schema::dropIfExists('kyluat');
    }
}
