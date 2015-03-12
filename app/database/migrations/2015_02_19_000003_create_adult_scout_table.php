<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdultScoutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('adult_scout', function(Blueprint $table) {
                        $table->increments('id');
                        $table->enum('relationship', array('Scout', 'Mother', 'Father', 'Other'))->default('Scout');
                        $table->unsignedInteger('scout_id');   // Scout who earned the award.
                        $table->foreign('scout_id')
                                ->references('id')
                                ->on('persons')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
                        $table->unsignedInteger('adult_id');     // Adult who signs off on award.
                        $table->foreign('adult_id')
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
                Schema::dropIfExists('adult_scout');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
