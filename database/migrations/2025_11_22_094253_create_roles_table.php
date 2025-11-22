<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();

            // Canonical role name (e.g., 'admin', 'editor', 'support')
            $table->string('name')->unique();

            // Optional human description
            $table->string('description')->nullable();

            $table->timestamps();

            // Index to help sort or filter by name if needed
            $table->index('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
