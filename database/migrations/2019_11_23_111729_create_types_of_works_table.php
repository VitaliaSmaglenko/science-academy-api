<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesOfWorksTable extends Migration
{
    public function up(): void
    {
        Schema::create('types_of_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string("type");
            $table->enum("part", ["Підготовка", "Керівництво", "Інше"]);
            $table->string("title");
            $table->string("reference");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('types_of_works');
    }
}
