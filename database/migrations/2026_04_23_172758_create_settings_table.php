<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This function creates the settings table.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Link to users table
            // This connects settings to a specific user
            $table->foreignId('user_id')
                  ->unique()
                  ->constrained()
                  ->onDelete('cascade');

            // Theme setting
            // Stores: light or dark
            $table->string('theme')
                  ->default('light');

            // Font size setting
            // Stores: small, medium, large
            $table->string('font_size')
                  ->default('medium');

            // Laravel automatic timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * This function deletes the settings table.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};