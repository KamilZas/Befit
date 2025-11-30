<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('performed_exercises', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('training_session_id')->constrained()->onDelete('cascade');
        $table->foreignId('exercise_type_id')->constrained('exercise_types')->onDelete('restrict');
        $table->decimal('weight', 8, 2)->nullable(); // obciążenie (kg)
        $table->unsignedSmallInteger('sets'); // liczba serii
        $table->unsignedSmallInteger('reps'); // liczba powtórzeń w serii
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performed_exercises');
    }
};
