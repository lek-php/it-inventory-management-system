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
        Schema::create('users', function (Blueprint $table) {
            $table->string('employee_id')->nullable()->unique();
            $table->string('name');
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('position');
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_login_user')->default(false);
            $table->string('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
