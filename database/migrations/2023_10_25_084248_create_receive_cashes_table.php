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
        Schema::create('receive_cashes', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_number')->unique();
            $table->date('receive_date'); 
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->foreignId('service_provider_id')->nullable()->constrained('service_providers')->nullOnDelete();
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();   
            
            $table->date('finish_date')->nullable();
            $table->foreignId('from_lang_id')->nullable()->constrained('languages')->nullOnDelete();
            $table->foreignId('to_lang_id')->nullable()->constrained('languages')->nullOnDelete();
            
            $table->float('service_price')->default(0);        
            $table->float('paid_amount')->default(0);    
            $table->float('remaining_amount')->default(0);      
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
        Schema::dropIfExists('receive_cashes');
    }
};