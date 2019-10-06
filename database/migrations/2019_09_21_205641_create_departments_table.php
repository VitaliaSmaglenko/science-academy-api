<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{

    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department');
            $table->enum('city', ['Бахмут', 'Харків']);
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
}
