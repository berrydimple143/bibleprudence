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
        Schema::create('outlines', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable();
            $table->string('support_text')->nullable();
            $table->string('theme')->nullable();
            $table->string('introduction')->nullable();
            $table->string('keyword')->nullable();
            $table->string('proposition')->nullable();
            $table->text('conclusion')->nullable();
            $table->foreignId('topic_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlines');
    }
};
