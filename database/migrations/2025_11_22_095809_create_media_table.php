<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            // Polymorphic relation: model_type + model_id
            $table->morphs('model'); // creates model_type (string) + model_id (unsignedBigInteger)

            // Storage details
            $table->string('disk')->default('public'); // e.g. 'public', 's3'
            $table->string('path');                    // relative path to file
            $table->string('alt_text')->nullable();    // accessibility / SEO

            // Ordering
            $table->unsignedInteger('sort_order')->default(0)->index();

            $table->timestamps();

            // Helpful composite index for polymorphic lookups
            $table->index(['model_type', 'model_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
