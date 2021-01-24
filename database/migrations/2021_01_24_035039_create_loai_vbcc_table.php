<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiVbccTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_vbcc', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('lvbcc_ma')->autoIncrement();
            $table->string('lvbcc_ten', 100);
            $table->timestamp('lvbcc_taoMoi')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('lvbcc_capNhat')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_vbcc');
    }
}
