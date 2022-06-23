<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookissues', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->string('id_no')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('book_id')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('return')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('bookissues');
    }
};
