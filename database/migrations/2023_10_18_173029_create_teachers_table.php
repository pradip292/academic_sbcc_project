<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('teacher');
            $table->string('Year'); // String to reference Year from the "years" table
            $table->string('dept_name'); // String to reference dept_name from the "departments" table
            $table->string('division');
            // Define foreign keys
            $table->foreign('Year')->references('Year')->on('years');
            $table->foreign('dept_name')->references('dept_name')->on('departments');
            $table->foreign('division')->references('division')->on('classes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
