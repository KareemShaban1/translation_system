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
        Schema::create('receive_cash_reminder', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receive_cash_id')->nullable()->constrained('receive_cashes')->nullOnDelete();
            $table->date('receive_cash_reminder_date'); 
            // $table->float('service_price')->default(0);        
            $table->float('paid_amount')->default(0);    
            $table->float('remaining_amount')->default(0);  
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receive_cash_reminder');
    }
};