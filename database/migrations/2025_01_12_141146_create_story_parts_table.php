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
        Schema::create('story_parts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tytuł części historii
            $table->text('content'); // Treść części historii
            $table->unsignedInteger('order'); // Kolejność w historii
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story_parts');
    }
};
