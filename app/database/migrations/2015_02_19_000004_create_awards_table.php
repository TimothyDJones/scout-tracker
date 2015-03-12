<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAwardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('awards', function(Blueprint $table) {
                        $table->increments('id');
                        $table->string('class_name', 20)->index();   // The derived class name:  'MeritBadge' or 'Rank'
                        $table->string('award_name', 30);
                        $table->integer('reqts_last_changed_year');
                        $table->boolean('eagle_reqd_ind')->default(FALSE);
                        $table->string('award_image')->nullable();
                        $table->string('merit_badge_org_url', 255)->nullable();
                        $table->unsignedInteger('rank_sort_sequence')->default(0);
                        $table->unsignedInteger('primary_counselor_id')->nullable();
                        $table->foreign('primary_counselor_id')
                                ->references('id')
                                ->on('persons')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');                        
                        $table->date('completed');
                        $table->unsignedInteger('scout_id');
                        $table->foreign('scout_id')    // Scout who earned the award.
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
                Schema::dropIfExists('awards');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
