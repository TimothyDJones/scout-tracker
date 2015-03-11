<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScoutRankRequirementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('scout_rank_requirement', function(Blueprint $table) {
                        $table->increments('id');
                        $table->unsignedInteger('rank_requirement_id');
                        $table->foreign('rank_requirement_id')
                                ->references('id')
                                ->on('rank_requirements')
                                ->onDelete('cascade')
                                ->onUpdate('cascade')
                                ->nullable();
                        $table->unsignedInteger('scout_id');
                        $table->foreign('scout_id')
                                ->references('id')
                                ->on('scouts')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
                        $table->unsignedInteger('approver_id');
                        $table->foreign('approver_id')
                                ->references('id')
                                ->on('adults')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
                        $table->date('requirement_completed_date');				
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
                Schema::dropIfExists('scout_rank_requirement');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
