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
        Schema::create('activities', function (Blueprint $table) {
            $table->id(); // Unique ID for each activity
            $table->string('description'); // Activity description (e.g., "Daily SMS count")
            $table->enum('status', ['done', 'pending'])->default('pending'); // Status: either 'done' or 'pending'
            $table->text('remarks')->nullable(); // Optional remarks for each activity
            $table->foreignId('updated_by')->constrained('users'); // Links to the user who updated the activity
            $table->timestamps(); // Automatically tracks when the activity was created and updated
            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
