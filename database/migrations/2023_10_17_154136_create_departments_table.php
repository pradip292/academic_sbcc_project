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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('dept_name');
            $table->boolean('deactivated')->default(1);
            $table->timestamps();
            
            $table->unique(['dept_name', 'deactivated']); // Combined unique constraint
        });
    }


    public function down()
    {
        Schema::dropIfExists('departments');
    }

    public function years()
    {
        return $this->belongsToMany(Year::class, 'department_year_division');
    }
};
