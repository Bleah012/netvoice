<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // Canonical identifiers
            $table->string('name')->unique();       // e.g. "Cloud Hosting"
            $table->string('slug')->unique();       // URL-friendly identifier

            // Content
            $table->string('summary')->nullable();  // short tagline
            $table->longText('body')->nullable();   // detailed description

            // Status and ordering
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
