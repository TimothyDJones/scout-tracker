<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('positions', function(Blueprint $table) {
                        $table->increments('id');
                        $table->string('position_code', 5)->index();
                        $table->string('position_name', 30);
                        $table->string('position_description', 1024)->nullable();
                        $table->enum('type', array('Adult', 'Scout'))->default('Scout');
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
                Schema::dropIfExists('positions');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
