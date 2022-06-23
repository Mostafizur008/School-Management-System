<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCountryDistrictUpazilaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sortname');
            $table->string('phonecode');
            $table->timestamps();
        });
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('country_id');
            $table->timestamps();
        });
        Schema::create('upazilas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('district_id');            
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
        Schema::drop('countries');
        Schema::drop('districts');
        Schema::drop('upazilas');
    }
}