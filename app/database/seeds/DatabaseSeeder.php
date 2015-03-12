<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AddressesTableSeeder');
                $this->call('ScoutsTableSeeder');
                $this->call('AdultsTableSeeder');
                $this->call('RanksTableSeeder');
                $this->call('AdultPositionsTableSeeder');
                $this->call('ScoutPositionsTableSeeder');
	}

}
