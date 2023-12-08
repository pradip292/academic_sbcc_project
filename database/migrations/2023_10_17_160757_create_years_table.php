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
        Schema::create('years', function (Blueprint $table) {
            $table->string('Year',100)->primary();
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
    ///testing
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_year_division');
    }

    public function divisions()
    {
        return $this->belongsToMany(Division::class, 'department_year_division');
    }
};
