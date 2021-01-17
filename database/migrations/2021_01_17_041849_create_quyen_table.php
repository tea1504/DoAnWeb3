<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('q_ma')
                    ->autoIncrement();
            $table->string('q_ten', 50);
            $table->text('q_mota');
            $table->timestamp('q_taoMoi') 
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('q_capNhat') 
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
        Schema::dropIfExists('quyen');
    }
}
