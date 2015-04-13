<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAwardsRequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('awards_requirements', function(Blueprint $table) {
                        $table->increments('id');
                        $table->unsignedInteger('award_id');
                        $table->foreign('award_id')
                                ->references('id')
                                ->on('awards')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');   
                        $table->string('award_identifier', 10);         // This is the named identifier like '1', '4(a)', etc.
                        $table->string('award_details');
                        $table->unsignedInteger('award_identifer_sort_seq')->default(0);
                        $table->timestamps();
                        $table->unique(array('award_id', 'award_identifer_sort_seq'));
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
                Schema::dropIfExists('awards_requirements');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
