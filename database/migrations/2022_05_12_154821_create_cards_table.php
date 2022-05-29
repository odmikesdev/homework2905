<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->foreignId('column_id');
            $table->foreignId('author_id');
            $table->foreignId('executor_id');
            $table->string('description');
            $table->timestamps();

            $table->foreign('column_id')->references('id')->on('columns');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('executor_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('columns', function (Blueprint $table) {
            $table->dropForeign(['board_id']);
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->dropForeign(['column_id']);
            $table->dropForeign(['author_id']);
            $table->dropForeign(['executor_id']);
        });

        Schema::dropIfExists('cards');
        Schema::dropIfExists('columns');
    }
};
