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
            $table->string('nominee_first_name', 4000)->change();
            $table->string('nominee_last_name', 4000)->change();
            $table->string('nominee_status', 4000)->change();
            $table->string('nominee_work', 4000)->change();
            $table->string('nominee_impact', 4000)->nullable()->change();
            $table->string('nominee_links', 4000)->nullable()->change();
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
