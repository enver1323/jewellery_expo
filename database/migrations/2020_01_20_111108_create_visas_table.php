<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            /** Columns */
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('gender');
            $table->string('position');
            $table->string('address');
            $table->string('citizenship');
            $table->string('embassy_address');
            $table->timestamp('check_in_at')->useCurrent();
            $table->timestamp('check_out_at')->useCurrent();
            $table->timestamps();

            /** Relations */
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('visas');
    }
}
