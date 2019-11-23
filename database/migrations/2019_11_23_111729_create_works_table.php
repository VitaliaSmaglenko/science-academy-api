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
            $table->string("name");
            $table->enum("type", ["Підготовка", "Керівництво", "Інше"]);
            $table->string("title_hint")->nullable();
            $table->string("reference_hint")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('works');
    }
}
