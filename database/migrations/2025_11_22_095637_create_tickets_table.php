<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('user_id')->nullable()
                  ->constrained('users')
                  ->nullOnDelete(); // keep ticket history if user deleted

            $table->foreignId('client_id')->nullable()
                  ->constrained('clients')
                  ->nullOnDelete(); // keep ticket history if client deleted

            $table->string('subject');
            $table->longText('description');

            // Status & priority
            $table->enum('status', ['open','in_progress','resolved','closed'])
                  ->default('open')->index();
            $table->enum('priority', ['low','normal','high','urgent'])
                  ->default('normal')->index();

            // Assignment
            $table->foreignId('assigned_to')->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamp('closed_at')->nullable();

            $table->timestamps();

            // Helpful composite index
            $table->index(['status','priority']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
