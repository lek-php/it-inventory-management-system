<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    protected $fillable = [
        'asset_id',
        'employee_id',
        'location_id',
        'assigned_date',
        'ended_date',
        'assigned_by',
        'ended_by',
        'end_reason',
        'notes'
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_assignments', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->foreignId('asset_id')->constrained('assets');
            $table->string('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('users');
            $table->foreignId('location_id')->conStrained('locations');
            $table->date('assigned_date');
            $table->date('ended_date')->nullable();
            $table->string('assigned_by');
            $table->string('ended_by')->nullable();
            $table->enum('end_reason', ['transferred', 'EoL', 'returned']);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_assignments');
    }
};
