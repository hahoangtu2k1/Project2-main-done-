<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigInteger('id_student')->autoIncrement();
            $table->string('student_code',20);
            $table->string('name_student',40);
            $table->tinyInteger('gender');
            $table->string('phone',20);
            $table->date('dob');
            $table->string('address',255);
            $table->bigInteger('number_payment');
            $table->BigInteger('id_classes');
            $table->foreign('id_classes')->references('id_class')->on('classes');
            $table->BigInteger('id_scholarchip');
            $table->foreign('id_scholarchip')->references('id_hb')->on('scholarchips');
            $table->BigInteger('id_tolltype');
            $table->foreign('id_tolltype')->references('id_type')->on('tolltypes');
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
        Schema::dropIfExists('students');
    }
}
