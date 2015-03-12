<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Carbon\Carbon as Carbon;

class AdultsTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Project::create([

			]);
		}*/
		
		$adults = array(
                    array( 'first_name' => 'Daddy',
                        'last_name' => 'Smith',
                        'class_name' => 'Adult',
                        'bsa_id' => '873236122',
                        'email' => 'daddy@test.com',
                        'password' => NULL,
                        'home_phone' => '(918) 272 1234',
                        'cell_phone' => '(918) 747 1234',
                        'birth_date' => Carbon::createFromDate(1975, 12, 24),
                        'address_id' => 11,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,),
                    array( 'first_name' => 'Mommy',
                        'last_name' => 'Thompson',
                        'class_name' => 'Adult',
                        'bsa_id' => NULL,
                        'email' => 'mamat@test.com',
                        'password' => NULL,
                        'home_phone' => '(918) 371 1234',
                        'cell_phone' => '(918) 760 1234',
                        'birth_date' => Carbon::createFromDate(1980, 10, 16),
                        'address_id' => 12,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,),
                    array( 'first_name' => 'Obi Wan',
                        'last_name' => 'Kenobi',
                        'class_name' => 'Adult',
                        'bsa_id' => NULL,
                        'email' => 'lightsabreking@test.com',
                        'password' => NULL,
                        'home_phone' => '(616) 888 3333',
                        'cell_phone' => '(817) 512 8934',
                        'birth_date' => Carbon::createFromDate(1963, 4, 22),
                        'address_id' => 13,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,),  
                    array( 'first_name' => 'Padme',
                        'last_name' => 'Amidala',
                        'class_name' => 'Adult',
                        'bsa_id' => NULL,
                        'email' => 'galactichottie@test.com',
                        'password' => NULL,
                        'home_phone' => '(212) 233 7777',
                        'cell_phone' => '(907) 209 3333',
                        'birth_date' => NULL,
                        'address_id' => 14,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,),  
		); 
		
		// Uncomment the below to run the seeder
		DB::table('persons')->insert($adults);
	}

}
