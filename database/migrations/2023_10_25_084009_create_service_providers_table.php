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
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('another_phone_number');
            $table->string('email');
            $table->foreignId('expense_type_id')->constrained('expense_types')->cascadeOnDelete();
            // $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_providers');
    }
};