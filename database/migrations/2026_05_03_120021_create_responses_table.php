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
        Schema::create('responses', function (Blueprint $table) {
    $table->id();

    $table->string('age_group');
    $table->string('gender');
    $table->string('education');
    $table->string('occupation');
    $table->string('tech_usage');
    $table->string('ai_usage');
    $table->string('civic_participation');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
