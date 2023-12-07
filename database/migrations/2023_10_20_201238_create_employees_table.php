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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('branch_organic_unit_id')->constrained(table: 'branch_organic_unit');
            $table->foreignId('branch_department_id')->constrained(table: 'branch_department');
            $table->foreignId('branch_partition_id')->constrained(table: 'branch_partition');
            $table->foreignId('career_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('level_id')->constrained();
            $table->foreignId('salary_level_id')->constrained();
            $table->string('name');
            $table->date('birthdate');
            $table->integer('contact');
            $table->string('nationality')->nullable;
            $table->string('naturality')->nullable;
            $table->string('email');
            $table->string('father_name')->nullable;
            $table->string('mother_name')->nullable;
            $table->string('bi_nr');
            $table->date('bi_validate');
            $table->integer('nuit');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
