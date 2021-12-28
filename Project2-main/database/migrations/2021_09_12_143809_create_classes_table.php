<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigInteger('id_class')->autoIncrement();
            $table->string('name_class',40);
            $table->unsignedBigInteger('id_major');
            $table->foreign('id_major')->references('id')->on('majors');
            $table->unsignedBigInteger('id_schoolyear');
            $table->foreign('id_schoolyear')->references('id')->on('schoolyears');
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
        Schema::dropIfExists('classes');
    }
}
