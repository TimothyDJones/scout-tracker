<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class RanksTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Project::create([

			]);
		}*/
		
		$ranks = array(
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'New',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 0,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Scout',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 1,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Tenderfoot',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 2,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Second Class',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 3,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'First Class',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 4,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Star',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 5,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Life',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 6,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Eagle',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 7,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Bronze Palm',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 8,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Gold Palm',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 9,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'class_name' => 'Rank',
                        'award_name' => 'Silver Palm',
                        'reqts_last_changed_year' => new DateTime('Y'),
                        'rank_sort_sequence' => 10,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
		); 
                

		
		// Uncomment the below to run the seeder
		DB::table('awards')->insert($ranks);
	}

}
