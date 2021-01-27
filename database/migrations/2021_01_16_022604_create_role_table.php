<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('role_ma')
                    ->autoIncrement();
            $table->string('role_ten', 50);
            $table->text('role_mota');
            $table->timestamp('role_taoMoi') 
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('role_capNhat') 
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
        Schema::dropIfExists('role');
    }
}
