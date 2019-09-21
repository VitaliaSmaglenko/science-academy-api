<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('departments_users', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('department_id');
            $table->enum('position', [
                'Завідувач кафедри',
                'Професор',
                'Доцент',
                'Старший викладач',
                'Викладач',
                'Асистент',
                ]);
            $table->timestamps();

//            $table->foreign('department_id')->references('id')->on('departments')
//                ->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')
//                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('departments_users', function ($table) {
            $table->engine = 'InnoDB';
            $table->foreign('department_id')->references('id')->on('departments')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('departments_users');
    }
}
