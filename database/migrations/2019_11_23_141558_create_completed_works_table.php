<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletedWorksTable extends Migration
{
    public function up(): void
    {
        Schema::create('completed_works', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('type_id');
            $table->string("title");
            $table->string("reference")->nullable();
            $table->unsignedInteger('co_author_id')->nullable();
            $table->double("number_of_hours");
            $table->enum("season", ["Осінь", "Весна"]);
            $table->timestamps();
        });

        Schema::table('completed_works', function ($table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('co_author_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('works')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('completed_works');
    }
}
