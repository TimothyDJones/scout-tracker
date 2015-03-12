<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRankRequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('rank_requirements', function(Blueprint $table) {
                        $table->increments('id');
                        $table->string('requirement_identifier');
                        $table->string('requirement_description', 2000);
                        $table->integer('requirement_year');
                        $table->integer('reqt_sort_sequence');
                        $table->unsignedInteger('rank_id');
                        $table->foreign('rank_id')
                                ->references('id')
                                ->on('ranks')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
                        $table->timestamps();
                });                
                
                // Re-enable FK constraints...  Just in case!  :)
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
                
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
                DB::statement('SET FOREIGN_KEY_CHECKS = 0');
                Schema::dropIfExists('rank_requirements');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
