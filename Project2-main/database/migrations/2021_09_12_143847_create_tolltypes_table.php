<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTolltypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tolltypes', function (Blueprint $table) {
            $table->bigInteger('id_type')->autoIncrement();
            $table->string('tolltype',40);
            $table->bigInteger('discount');
            $table->bigInteger('number_batch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tolltypes');
    }
}
