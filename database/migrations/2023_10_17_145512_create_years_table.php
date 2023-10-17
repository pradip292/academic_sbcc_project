<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->year('Year')->primary();
            $table->string('FY')->nullable();
            $table->string('SY')->nullable();
            $table->string('TY')->nullable();
            $table->string('Btech')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('years');
    }
};
