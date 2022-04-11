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
        Schema::create('users_test_answers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('test_session_id');
            $table->foreign('test_session_id')->references('id')->on('test_sessions')->onDelete('cascade');

            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('test_answers')->onDelete('cascade');

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
        Schema::dropIfExists('users_test_answers');
    }
};
