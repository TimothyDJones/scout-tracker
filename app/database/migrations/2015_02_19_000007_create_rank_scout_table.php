<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRankScoutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('rank_scout', function(Blueprint $table) {
                        $table->increments('id');
                        $table->unsignedInteger('rank_id');
                        $table->foreign('rank_id')
                                ->references('id')
                                ->on('awards')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');                             
                        $table->unsignedInteger('scout_id');
                        $table->foreign('scout_id')
                                ->references('id')
                                ->on('persons')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');     
                        $table->date('rank_awarded_date')->nullable();
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
                Schema::dropIfExists('rank_scout');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
