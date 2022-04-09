<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 150);
            $table->string('first_name', 150);
            $table->integer('age')->default(0);
            $table->decimal('height', 5, 2)->nullable()->default(0);
            $table->integer('team_id')->default(0);
            $table->integer('debut_year')->default(1990);
            $table->string('position', 150);
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('players');
    }
}
