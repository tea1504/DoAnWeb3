<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuyendungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyendung', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->unsignedInteger('td_ma')
                    ->autoIncrement();
            $table->string('nv_ma', 10);
            $table->date('td_ngay');
            $table->string('td_ngheTruocDay', 100);
            $table->unsignedTinyInteger('dv_ma');
            $table->string('td_coQuanTuyen', 100)->nullable();
            $table->unsignedTinyInteger('cvu_ma');
            $table->date('td_ngayLam');
            $table->unsignedTinyInteger('cv_ma');
            $table->string('td_soTruong', 100)->nullable();
            $table->timestamp('td_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('td_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('nv_ma')
                    ->references('nv_ma')
                    ->on('nhanvien')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('dv_ma')
                    ->references('dv_ma')
                    ->on('donvi')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('cvu_ma')
                    ->references('cvu_ma')
                    ->on('chucvu')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('cv_ma')
                    ->references('cv_ma')
                    ->on('congviec')
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
        Schema::dropIfExists('tuyendung');
    }
}
