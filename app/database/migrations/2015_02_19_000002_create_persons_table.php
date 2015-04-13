<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('persons', function(Blueprint $table) {
                        $table->increments('id');
                        $table->string('person_class_name', 20)->default('Scout')->index();
                        $table->string('bsa_id', 15)->nullable();
                        $table->string('first_name', 20);
                        $table->string('last_name', 30);
                        $table->string('email_address', 50)->nullable();
                        $table->string('password')->default('-999');
                        $table->string('primary_phone', 20)->nullable();
                        $table->string('secondary_phone', 20)->nullable();
                        $table->date('birth_date')->nullable();
                        $table->boolean('admin_ind')->default(FALSE);
                        $table->string('remember_token')->nullable();
                        $table->unsignedInteger('address_id');
                        $table->foreign('address_id')
                                ->references('id')
                                ->on('addresses')
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
                Schema::dropIfExists('persons');
                DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
