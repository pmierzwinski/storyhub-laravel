<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('story_parts', function (Blueprint $table) {
            $table->unsignedBigInteger('previous_part_id')->nullable()->after('id');
            $table->unsignedBigInteger('next_part_id')->nullable()->after('previous_part_id');

            // Opcjonalnie: Dodaj klucze obce, jeśli chcesz wymusić spójność danych
            $table->foreign('previous_part_id')->references('id')->on('story_parts')->onDelete('set null');
            $table->foreign('next_part_id')->references('id')->on('story_parts')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('story_parts', function (Blueprint $table) {
            $table->dropForeign(['previous_part_id']);
            $table->dropForeign(['next_part_id']);
            $table->dropColumn(['previous_part_id', 'next_part_id']);
        });
    }

};
