<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('ranks', function(Blueprint $table) {
                        $table->increments('id');
                        $table->string('rank_name');
			$table->integer('rank_sort_sequence');
			$table->date('board_of_review_date');
			$table->date('sm_conf_date');
			$table->date('awarded_date');
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
                Schema::dropIfExists('ranks');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
