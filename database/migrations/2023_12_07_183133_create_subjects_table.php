<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('dept_name'); // Foreign key
            $table->unsignedInteger('year');
            $table->timestamps();

            // Define the foreign key constraint
           // $table->foreign('dept_name')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
