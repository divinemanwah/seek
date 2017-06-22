<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('group_id')->unsigned()->nullable();
			$table->integer('type_id')->unsigned()->nullable();
			$table->longText('description');
			$table->longText('meta');
			$table->boolean('active')->default(1);
            $table->timestamps();
			
			$table->foreign('group_id')->references('id')->on('groups');
			$table->foreign('type_id')->references('id')->on('ad_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
}
