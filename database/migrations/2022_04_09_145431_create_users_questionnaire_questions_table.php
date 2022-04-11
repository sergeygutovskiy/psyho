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
        Schema::create('users_questionnaire_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ;
            
            $table->unsignedBigInteger('question_id');
            $table
                ->foreign('question_id')
                ->references('id')
                ->on('questionnaire_questions')
                ->onDelete('cascade')
                ;

            $table->primary([ 'user_id', 'question_id' ]);

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
        Schema::dropIfExists('users_questionnaire_questions');
    }
};
