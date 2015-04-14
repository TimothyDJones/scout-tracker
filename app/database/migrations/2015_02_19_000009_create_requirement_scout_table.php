<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequirementScoutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('requirement_scout', function(Blueprint $table) {
                        $table->increments('id');
                        $table->date('date_completed');
                        $table->unsignedInteger('reqt_id');   // Award requirement (requirement for either merit badge or rank).
                        $table->foreign('reqt_id')
                                ->references('id')
                                ->on('awards_requirements')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');                        
                        $table->unsignedInteger('scout_id');   // Scout who earned the award.
                        $table->foreign('scout_id')
                                ->references('id')
                                ->on('persons')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
                        $table->unsignedInteger('approver_id');     // Adult who signs off on award.
                        $table->foreign('approver_id')
                                ->references('id')
                                ->on('persons')
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
                Schema::dropIfExists('requirement_scout');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
