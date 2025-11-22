<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->string('name');
            $table->string('email')->unique();

            // Auth
            $table->string('password');

            // Access control flag (fast checks + index)
            $table->boolean('is_admin')->default(false)->index();

            // Optional auth helpers
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Auditing
            $table->timestamps();

            // Optional: additional indexes to optimize frequent queries
            $table->index(['email_verified_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
