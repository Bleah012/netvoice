<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('projects', function (Blueprint $table) {
        $table->string('category', 50)->nullable()->after('status')->index();
        $table->json('tags')->nullable()->after('category');
        $table->text('description')->nullable()->after('tags');
        $table->string('image')->nullable()->after('description');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('projects', function (Blueprint $table) {
        $table->dropColumn(['category','tags','description','image']);
    });
}
};
