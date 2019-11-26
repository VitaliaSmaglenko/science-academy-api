<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicatorsTable extends Migration
{

    public function up(): void
    {
        Schema::create('indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('work_id');
            $table->double("number_of_hours");
            $table->enum("season", ["Осінь", "Весна"]);
            $table->integer("quantity");
            $table->timestamps();
        });

        Schema::table('indicators', function ($table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('work_id')->references('id')->on('works')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indicators');
    }
}
