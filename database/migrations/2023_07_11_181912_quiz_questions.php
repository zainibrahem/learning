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
        Schema::create('quiz_question', function (Blueprint $table) {

            $table->foreignId('quiz_id')->constrained("quizs")->onDelete('cascade');

            $table->foreignId('question_id')->constrained("quiz_quistions")->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
