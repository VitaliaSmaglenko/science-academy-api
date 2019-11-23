<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string("type");
            $table->enum("part", ["Підготовка", "Керівництво", "Інше"]);
            $table->string("title_hint");
            $table->string("reference_hint");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('works');
    }
}
