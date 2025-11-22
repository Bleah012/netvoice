<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            // FKs with referential integrity and cascade on delete
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('role_id')
                  ->constrained('roles')
                  ->onDelete('cascade');

            // Prevent duplicate role assignments for the same user
            $table->unique(['user_id', 'role_id']);

            // Helpful indexes for join performance
            $table->index('user_id');
            $table->index('role_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
