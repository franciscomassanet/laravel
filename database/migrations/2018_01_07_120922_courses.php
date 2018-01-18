<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject_icon');
            $table->string('subject');
            $table->integer('level');
			$table->string('name')->unique();
            $table->string('classroom_link', 2000);
			$table->string('view_link');
			$table->timestamp('Date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::dropIfExists('courses');
    }
}
