<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsToTextNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nominations', function (Blueprint $table) {
            $table->text('nominee_first_name')->change();
            $table->text('nominee_last_name')->change();
            $table->text('nominee_status')->change();
            $table->text('nominee_work')->change();
            $table->text('nominee_impact')->nullable()->change();
            $table->text('nominee_links')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nominations', function (Blueprint $table) {
            $table->string('nominee_first_name')->change();
            $table->string('nominee_last_name')->change();
            $table->string('nominee_status')->change();
            $table->string('nominee_work')->change();
            $table->string('nominee_impact')->nullable()->change();
            $table->string('nominee_links')->nullable()->change();
        });
    }
}
