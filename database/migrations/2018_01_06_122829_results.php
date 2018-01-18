<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Results extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CourseID');
            $table->string('CourseName');
            $table->string('Results');
			$table->string('Grade');
            $table->string('Email');
			$table->string('Duration');
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
		Schema::dropIfExists('results');
    }
}
