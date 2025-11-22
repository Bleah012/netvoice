<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // Canonical identifiers
            $table->string('name')->unique();       // e.g. "NetVoice Ltd"
            $table->string('slug')->unique();       // URL-friendly identifier

            // Contact info
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            // Notes
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
