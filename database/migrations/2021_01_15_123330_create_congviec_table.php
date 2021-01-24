<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongviecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congviec', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('cv_ma')->autoIncrement();
            $table->string('cv_ten',50);
            $table->text('cv_moTa')->nullable();
            
            $table->timestamp('cv_taoMoi') 
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cv_capNhat') 
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
        Schema::dropIfExists('congviec');
    }
}
