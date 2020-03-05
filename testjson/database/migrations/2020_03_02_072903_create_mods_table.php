<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('adds_tags');
            $table->string('domain');
            $table->string('generation_type');
            $table->string('generation_weights');
            $table->string('grants_buff');
            $table->string('grants_effects');
            $table->string('group');
            $table->string('is_essence_only');
            $table->string('name');
            $table->integer('required_level');
            $table->string('spawn_weights');
            $table->string('stats');
            $table->string('type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mods');
    }
}
