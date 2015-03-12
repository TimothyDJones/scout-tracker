<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class ScoutsTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Project::create([

			]);
		}*/
		
		$scouts = array(
                    array( 'first_name' => 'Bob',
                        'last_name' => 'Smith',
                        'class_name' => 'Scout',
                        'bsa_id' => '1234567890',
                        'email' => 'scout1@test.com',
                        'password' => NULL,
                        'home_phone' => '(918) 123 4567',
                        'cell_phone' => NULL,
                        'birth_date' => Carbon::createFromDate(2003, 5, 21),
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,),
                    array( 'first_name' => 'Tom',
                        'last_name' => 'Thompson',
                        'class_name' => 'Scout',
                        'bsa_id' => '867530933',
                        'email' => 'scout23@test.com',
                        'password' => NULL,
                        'home_phone' => '(918) 555 1234',
                        'cell_phone' => NULL,
                        'birth_date' => Carbon::createFromDate(2005, 7, 3),
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,),
                    array( 'first_name' => 'Aaron',
                        'last_name' => 'Zebedee',
                        'class_name' => 'Scout',
                        'bsa_id' => '2342343777',
                        'email' => 'aaronz@test.com',
                        'password' => NULL,
                        'home_phone' => '(918) 634 3333',
                        'cell_phone' => '(918) 720 8888',
                        'birth_date' => Carbon::createFromDate(2001, 1, 31),
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,),  
                    array( 'first_name' => 'Zachary',
                        'last_name' => 'Bland',
                        'class_name' => 'Scout',
                        'bsa_id' => NULL,
                        'email' => 'zzzz@test.com',
                        'password' => NULL,
                        'home_phone' => '(918) 634 3333',
                        'cell_phone' => '(918) 720 8888',
                        'birth_date' => NULL,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,),  
                    array(),
		); 
                
                for ( $i = 0; $i < 10; $i++ ) {
                    $faker = Faker::create();
                    $scouts[] = array(
                        'first_name' => $faker->firstNameMale,
                        'last_name' => $faker->lastName,
                        'bsa_id' => $faker->ean8,
                        'email' => $faker->safeEmail,
                        'password' => NULL,
                        'home_phone' => '(' . $faker->randomNumber(3) . ') ' . $faker->randomNumber(3) . ' ' . $faker->randomNumber(4),
                        'cell_phone' => '(' . $faker->randomNumber(3) . ') ' . $faker->randomNumber(3) . ' ' . $faker->randomNumber(4), 
                        'birth_date' => $faker->dateTimeBetween('-18 years', '-8 years'),
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,                        
                    );
                }
		
		// Uncomment the below to run the seeder
		DB::table('persons')->insert($scouts);
	}

}
