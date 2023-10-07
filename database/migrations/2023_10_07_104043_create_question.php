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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('qname');
            $table->string('qoption1')->nullable();
            $table->string('qoption2')->nullable();
            $table->string('qoption3')->nullable();
            $table->string('qoption4')->nullable();
            $table->string('qoption5')->nullable();
            $table->string('qoption6')->nullable();
            $table->string('qoption7')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
