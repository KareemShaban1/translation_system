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
        Schema::create('cash_outs', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_number');
            $table->date('date');
            $table->foreignId('expense_type_id')->nullable()->constrained('expense_types')->nullOnDelete();
            // $table->enum('recipient',['client','service_provider','user']);
            // $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->foreignId('service_provider_id')->nullable()->constrained('service_providers')->nullOnDelete();
            // $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();  
            $table->float('paid_amount')->default(0);   
            $table->text('description')->nullable();
     
            $table->softDeletes();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_outs');
    }
};