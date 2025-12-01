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
            $table->string('name', 150)->unique();   // e.g. "Cloud Hosting"
            $table->string('slug', 160)->unique();   // URL-friendly identifier

            // Content
            $table->string('summary', 255)->nullable();       // short tagline
            $table->longText('body')->nullable();             // detailed description
            $table->string('hero_heading', 255)->nullable();  // page hero title
            $table->string('hero_subheading', 255)->nullable(); // page hero subtitle

            // Structured arrays (JSON)
            $table->json('features')->nullable();        // key features list
            $table->json('process_steps')->nullable();   // implementation steps
            $table->json('partners')->nullable();        // trusted vendors

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
