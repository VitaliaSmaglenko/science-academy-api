<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScientistProfilesTable extends Migration
{
    public function up(): void
    {
        Schema::create('scientist_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('profile_link');
            $table->integer('number_of_publication');
            $table->integer('index');
            $table->timestamps();
        });

        Schema::table('scientist_profiles', function ($table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scientist_profiles');
    }
}
