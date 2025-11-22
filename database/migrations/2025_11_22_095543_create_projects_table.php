<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // Foreign key to clients
            $table->foreignId('client_id')
                  ->constrained('clients')
                  ->onDelete('cascade'); // if client is deleted, projects go too

            // Canonical identifiers
            $table->string('name');
            $table->string('slug')->unique();

            // Status tracking
            $table->enum('status', ['planned','active','paused','completed'])->index();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            // Helpful composite index
            $table->index(['client_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
