<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class AddressesTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Project::create([

			]);
		}*/
            
               for ( $i = 0; $i < 10; $i++ ) {
                    $faker = Faker::create();
                    $addresses[] = array(
                        'addr1' => $faker->buildingNumber . ' ' . $faker->streetName,
                        'addr2' => $i % 3 ? $faker->secondaryAddress : NULL,
                        'city' => $i % 3 ? 'Collinsville' : 'Owasso',
                        'state' => 'OK',
                        'postal_code' => $i % 3 ? '74021' : '74055',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,                        
                    );
                }
		
		// Uncomment the below to run the seeder
		DB::table('addresses')->insert($addresses);
	}

}
