<?php

use App\Models\Branch;
use App\Models\Career;
use App\Models\Category;
use App\Models\Department;
use App\Models\Level;
use App\Models\OrganicUnit;
use App\Models\Partition;
use App\Models\SalaryLevel;
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
            $table->foreignIdFor(Branch::class)->constrained();
            $table->foreignIdFor(OrganicUnit::class)->constrained();
            $table->foreignIdFor(Department::class)->constrained();
            $table->foreignIdFor(Partition::class)->constrained();
            $table->foreignIdFor(Career::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();
            $table->foreignIdFor(Level::class)->constrained();
            $table->foreignIdFor(SalaryLevel::class)->constrained();
            $table->string('name');
            $table->date('birthdate');
            $table->integer('contact');
            $table->string('nationality')->nullable();
            $table->string('naturality')->nullable();
            $table->string('email');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
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
