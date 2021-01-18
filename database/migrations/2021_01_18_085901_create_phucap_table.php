<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhucapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phucap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('pc_ma')->autoIncrement();
            $table->string('pc_ten', 50); 
            $table->double('pc_heSoPhuCap', 3); 
            $table->timestamp('pc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('pc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phucap');
    }
}
