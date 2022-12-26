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
        Schema::create('t_hearth_satuses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->integer('bodytemp');
            $table->timestamp('bodytemptime');
            $table->string('cough', 1);
            $table->string('headache', 1);
            $table->string('dulness', 1);
            $table->string('hearthlessness', 1);
            $table->string('abnormal_taste', 1);
            $table->string('cold_sympotoms', 1);
            $table->string('subjective_symptoms', 255);
            $table->string('userid');
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
        Schema::dropIfExists('t_hearth_satuses');
    }
};
