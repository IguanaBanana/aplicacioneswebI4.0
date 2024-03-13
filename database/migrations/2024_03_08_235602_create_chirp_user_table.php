<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChirpUserTable extends Migration
{
    public function up()
    {
        Schema::create('chirp_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('chirp_id')->constrained()->onDelete('cascade');
            $table->enum('action', ['like', 'dislike']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chirp_user');
    }
}

