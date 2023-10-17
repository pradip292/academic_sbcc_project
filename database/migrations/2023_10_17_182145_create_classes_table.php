<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('division');
            $table->string('year'); // String to reference Year from the "years" table
            $table->string('dept_name'); // String to reference dept_name from the "departments" table
        
            // Define foreign keys
            $table->foreign('year')->references('year')->on('years');
            $table->foreign('dept_name')->references('dept_name')->on('departments');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
