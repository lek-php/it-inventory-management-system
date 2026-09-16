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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name');
            $table->string('category');
            $table->string('tag')->unique();
            $table->string('manufacturer');
            $table->string('model');
            $table->string('serial_number')->unique();
            $table->string('vendor')->nullable();
            $table->enum('status', ['Available', 'Assigned', 'In repair', 'For maintenance', 'Not good', 'For disposal', 'Disposed'])->default('Available');
            $table->string('assigned_to')->nullable();
            $table->string('location')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expiration')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
