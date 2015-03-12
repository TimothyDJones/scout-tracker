<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class AdultPositionsTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Project::create([

			]);
		}*/
		
		$positions = array(
                    array( 
                        'position_code' => 'CC',
                        'position_name' => 'Committee Chair',
                        'type' => 'Adult',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'MC',
                        'position_name' => 'Committee Member',
                        'type' => 'Adult',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'CR',
                        'position_name' => 'Charter Organization Representative',
                        'type' => 'Adult',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'PS',
                        'position_name' => 'Scout Parent',
                        'type' => 'Adult',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'SM',
                        'position_name' => 'Scoutmaster',
                        'type' => 'Adult',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'SA',
                        'position_name' => 'Assistant Scoutmaster',
                        'type' => 'Adult',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => '42',
                        'position_name' => 'Merit Badge Counselor',
                        'type' => 'Adult',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
		); 
                

		
		// Uncomment the below to run the seeder
		DB::table('positions')->insert($positions);
	}

}
