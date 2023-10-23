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
        Schema::create('employee_position', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->foreignId('position_id')->constrained();
            $table->foreignId('branch_id')->constrained(); // daki para baixo cernario sem incluir as tabelas bkp
            $table->foreignId('branch_organic_unit_id')->constrained(table: 'branch_organic_unit');
            $table->foreignId('branch_department_id')->constrained(table: 'branch_department');
            $table->foreignId('branch_partition_id')->constrained(table: 'branch_partition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
