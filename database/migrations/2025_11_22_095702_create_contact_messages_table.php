<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();

            // Contact info
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();

            // Message content
            $table->string('subject');
            $table->longText('message');

            // Status tracking
            $table->enum('status', ['new','reviewed','responded','archived'])
                  ->default('new')->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
