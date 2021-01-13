<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhommauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhommau', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('mn_ma')->autoIncrement();
            $table->string('nm_ten',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhommau');
    }
}
