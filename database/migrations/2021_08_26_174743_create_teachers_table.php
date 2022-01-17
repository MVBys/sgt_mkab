<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->char('name', 100);
            $table->char('surname', 100);
            $table->char('patronymic', 100);
            $table->bigInteger('experience');
            $table->bigInteger('qualification_category_id');
            $table->foreign('qualification_category_id')->references('id')->on('qualification_category');
            $table->bigInteger('teaching_title_id');
            $table->foreign('teaching_title_id')->references('id')->on('teaching_title');
            $table->char('teacher_photo', 100);
            $table->char('portfolio_presentation', 100);
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
        Schema::dropIfExists('teachers');
    }
}
