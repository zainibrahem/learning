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
        Schema::create('quiz_quistions', function (Blueprint $table) {
            $table->id();
           // $table->foreignId("quiz_id")->constrained("quizs");
            $table->foreignId("subject_id")->constrained("subjects");
            $table->string("name");
            $table->enum("type",["multiSelect",'yesOrNo']);
            $table->foreignId("created_by")->constrained("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_quistions');
    }
};
