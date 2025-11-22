<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();

            // Canonical identifiers
            $table->string('name')->unique();       // e.g. "Telecommunications"
            $table->string('slug')->unique();       // URL-friendly identifier

            // Content
            $table->text('description')->nullable(); // optional industry description

            // Ordering
            $table->unsignedInteger('sort_order')->default(0)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industries');
    }
};
