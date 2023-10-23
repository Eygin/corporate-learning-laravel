<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMateri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->uuid('materi_id');
            $table->string('title', 255);
            $table->uuid('category_id')->nullable();
            $table->timestamps();
        });

        Schema::create('materi_file', function (Blueprint $table) {
            $table->id();
            $table->uuid('materi_file_id');
            $table->uuid('materi_id')->nullable();
            $table->string('path', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi');
        Schema::dropIfExists('materi_file');
    }
}
