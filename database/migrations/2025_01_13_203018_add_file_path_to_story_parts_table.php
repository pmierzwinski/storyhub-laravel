<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('story_parts', function (Blueprint $table) {
            $table->string('file_path')->nullable(); // Ścieżka do pliku
        });
    }

    public function down()
    {
        Schema::table('story_parts', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }

};
