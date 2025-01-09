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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount', 10, 2);
            $table->boolean('status')->default(1);
            $table->string('given_to', 200)->nullable();
            $table->string('type', 30)->nullable();            
            $table->timestamp('date_issued')->nullable();
            $table->string('notes')->nullable();
            $table->string('description')->nullable();
            $table->string('currency', 20)->nullable();      
            $table->foreignId('user_id')->constrained()->onDelete('cascade');       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
