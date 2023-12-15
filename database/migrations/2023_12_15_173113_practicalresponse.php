<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('practicalresponse', function (Blueprint $table) {
            $table->id();
            $table->string('prn');
            $table->string('roll'); 
            $table->string('name');
            $table->string('department_name');
            $table->string('class');
            $table->string('div');
            $table->string('subject');
            $table->string('sub_teacher');
            $table->integer('Q1');
            $table->integer('Q2');
            $table->integer('Q3');
            $table->integer('Q4');
            $table->integer('Q5');
            $table->integer('Q6');
            $table->integer('Q7');
            $table->integer('Q8');
            $table->integer('Q9');
            $table->integer('Q10');
            $table->integer('feedback-count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('practicalresponse');
    }
};
