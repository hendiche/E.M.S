<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailsToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('facebook')->default(false);
            $table->boolean('slack')->default(false);
            $table->boolean('google_calendar')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('facebook');
            $table->dropColumn('slack');
            $table->dropColumn('google_calendar');

        });
    }
}
