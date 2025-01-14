<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tytuł historii
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stories');
    }

};
