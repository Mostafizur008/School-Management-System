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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('usertype')->nullable()->comment('Teacher');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('name');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('religion')->nullable();
            $table->string('address')->nullable();
            $table->string('upazila')->nullable();
            $table->string('district')->nullable();
            $table->string('blood')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('id_no')->nullable();
            $table->string('code')->nullable();
            $table->date('join_date')->nullable();
            $table->integer('designation_id')->nullable();
            $table->integer('type_1')->nullable();
            $table->string('institution_1')->nullable();
            $table->string('point_1');
            $table->integer('passing_1')->nullable();
            $table->integer('roll_1')->nullable();
            $table->integer('type_2')->nullable();
            $table->string('institution_2')->nullable();
            $table->string('point_2');
            $table->integer('passing_2')->nullable();
            $table->integer('roll_2')->nullable();
            $table->integer('type_3')->nullable();
            $table->integer('institution_3')->nullable();
            $table->string('point_3');
            $table->integer('passing_3')->nullable();
            $table->integer('roll_3')->nullable();
            $table->integer('type_4')->nullable();
            $table->integer('institution_4')->nullable();
            $table->string('point_4');
            $table->integer('passing_4')->nullable();
            $table->integer('roll_4')->nullable();
            $table->string('salary')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 = inactive, 1 = active');
            $table->string('email');
            $table->string('password');
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
        Schema::dropIfExists('teachers');
    }
};
