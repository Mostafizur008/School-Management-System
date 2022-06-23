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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usertype')->nullable()->comment('Student,Teacher,Admin');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('name');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nid')->nullable();
            $table->string('blood')->nullable();
            $table->string('address')->nullable();
            $table->string('address_1')->nullable();
            $table->string('upazila')->nullable();
            $table->string('district')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('id_no')->nullable();
            $table->string('th_id_no')->nullable();
            $table->string('em_id_no')->nullable();
            $table->date('join_date')->nullable();
            $table->integer('designation_id')->nullable();
            $table->double('salary')->nullable();
            $table->integer('type_1')->nullable();
            $table->string('institution_1')->nullable();
            $table->integer('group_1')->nullable();
            $table->integer('board_1')->nullable();
            $table->string('point_1')->nullable();
            $table->integer('passing_1')->nullable();
            $table->string('roll_1')->nullable();
            $table->integer('type_2')->nullable();
            $table->string('institution_2')->nullable();
            $table->integer('group_2')->nullable();
            $table->integer('board_2')->nullable();
            $table->string('point_2')->nullable();
            $table->integer('passing_2')->nullable();
            $table->string('roll_2')->nullable();
            $table->integer('type_3')->nullable();
            $table->integer('institution_3')->nullable();
            $table->integer('group_3')->nullable();
            $table->integer('board_3')->nullable();
            $table->string('point_3')->nullable();
            $table->integer('passing_3')->nullable();
            $table->string('roll_3')->nullable();
            $table->integer('type_4')->nullable();
            $table->integer('institution_4')->nullable();
            $table->integer('group_4')->nullable();
            $table->integer('board_4')->nullable();
            $table->string('point_4')->nullable();
            $table->integer('passing_4')->nullable();
            $table->string('roll_4')->nullable();
            $table->string('profession_1')->nullable();
            $table->string('profession_2')->nullable();
            $table->string('mobile_1')->nullable();
            $table->string('image', 2048)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('code')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1)->comment('0 = inactive, 1 = active');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
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
        Schema::dropIfExists('users');
    }
};
