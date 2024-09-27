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
        Schema::create('acts', function (Blueprint $table) {
            $table->id();  // Это автоматически создаст PRIMARY KEY с auto-increment
            $table->string('sent');
            $table->date('date');
            $table->text('comments')->nullable();
            $table->string('received');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acts');
    }
};
