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
        Schema::table('t_hearth_satuses', function (Blueprint $table) {
            //
            $table->string('bodytemptime')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_hearth_satuses', function (Blueprint $table) {
            //
            $table->timestamp('bodytemptime')->change();
        });
    }
};
