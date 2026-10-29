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
    Schema::table('recipes', function (Blueprint $table) {
        $table->dropColumn(['difficulty', 'servings', 'notes']);
    });
}

public function down(): void
{
    Schema::table('recipes', function (Blueprint $table) {
        $table->string('difficulty')->nullable();
        $table->integer('servings')->nullable();
        $table->text('notes')->nullable();
    });
}
};
