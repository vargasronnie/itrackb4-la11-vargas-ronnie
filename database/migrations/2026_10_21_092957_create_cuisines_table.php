<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cuisines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('cuisine');
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->foreignId('cuisine_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropForeign(['cuisine_id']);
            $table->dropColumn('cuisine_id');
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->string('cuisine')->nullable();
        });

        Schema::dropIfExists('cuisines');
    }
};