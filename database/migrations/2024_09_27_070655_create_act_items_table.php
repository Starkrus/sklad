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
        Schema::create('act_items', function (Blueprint $table) {
            $table->id();  // PRIMARY KEY с auto-increment
            $table->unsignedBigInteger('act_id');  // Внешний ключ
            $table->string('name');
            $table->integer('count');
            $table->string('received');
            $table->timestamps();

            // Связь с таблицей 'acts'
            $table->foreign('act_id')->references('id')->on('acts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('act_items');
    }
};
