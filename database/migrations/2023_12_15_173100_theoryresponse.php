<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
         Schema::create('theoryresponses', function (Blueprint $table) {
            $table->id();
            $table->string('prn');
            $table->string('roll'); 
            $table->string('name')->nullable();
            $table->unsignedTinyInteger('sem')->nullable();
            $table->string('department_name')->nullable();
            $table->string('class')->nullable();
            $table->string('div')->nullable();
            $table->string('subject')->nullable();
            $table->string('sub_teacher')->nullable();
            $table->integer('Q1')->nullable();
            $table->integer('Q2')->nullable();
            $table->integer('Q3')->nullable();
            $table->integer('Q4')->nullable();
            $table->integer('Q5')->nullable();
            $table->integer('Q6')->nullable();
            $table->integer('Q7')->nullable();
            $table->integer('Q8')->nullable();
            $table->integer('Q9')->nullable();
            $table->integer('Q10')->nullable();
            $table->integer('feedback_count')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('theoryresponse');
    }
};
