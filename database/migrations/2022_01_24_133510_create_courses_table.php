<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id');
            $table->text('description')->nullable();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->string('status')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('nbr_student')->nullable();
            $table->string('duration')->nullable();
            $table->string('level')->nullable();
            $table->string('certificate')->nullable();
            $table->integer('old_price')->nullable();
            $table->string('type_duration')->nullable();
            $table->string('slug')->nullable();
            $table->string('flug')->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();

            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
