<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class ScoutPositionsTableSeeder extends Seeder {

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
                        'position_code' => 'PL',
                        'position_name' => 'Patrol Leader',
                        'position_description' => 'The patrol leader is the top leader of a patrol. He represents the patrol at all patrol leaders’ council meetings and the annual program planning conference and keeps patrol members informed of decisions made. He plays a key role in planning, leading, and evaluating patrol meetings and activities and prepares the patrol to participate in all troop activities. The patrol leader learns about the abilities of other patrol members and full involves them in patrol and troop activities by assigning them specific tasks and responsibilities. He encourages patrol members to complete advancement requirements and sets a good example by continuing to pursue his own advancement.',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'APL',
                        'position_name' => 'Assistant Patrol Leader',
                        'postion_description' => 'Acts in the role of the Patrol Leader, when the Patrol Leader is not available.',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'SPL',
                        'position_name' => 'Senior Patrol Leader',
                        'position_description' => 'The senior patrol leader is the top leader of the troop. He is responsible for the troop’s overall operation. With guidance from the Scoutmaster, he takes charge of troop meetings, of the patrol leaders’ council, and of all troop activities, and he does everything he can to help each patrol be successful. He is responsible for annual program planning conferences and assists the Scoutmaster in conducting troop leadership training. The senior patrol leader presides over the patrol leaders’ council and works closely with each patrol leader to plan troop meetings and make arrangements for troop activities. All members of a troop vote by secret ballot to choose their senior patrol leader. Rank and age requirements to be a senior patrol leader are determined by each troop, as is the schedule of elections. During a Scout’s time as senior patrol leader, he is not a member of any patrol but may participate with a Venture patrol in high-adventure activities.',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'ASPL',
                        'position_name' => 'Assistant Senior Patrol Leader',
                        'position_description' => 'The assistant senior patrol leader works closely with the senior patrol leader to help the troop move forward and serves as acting senior patrol leader when the senior patrol leader is absent. Among his specific duties, the assistant senior patrol leader trains and provides direction to the troop quartermaster, scribe, historian, librarian, instructors, and Order of the Arrow representative. During his tenure as assistant senior patrol leader he is not a member of a patrol, but he may participate in the high-adventure activities of a Venture patrol. Large troops may have more than one assistant senior patrol leader, each appointed by the senior patrol leader.',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'QM',
                        'position_name' => 'Quartermaster',
                        'position_description' => 'The quartermaster is the troop’s supply boss. He keeps an inventory of troop equipment and sees that the gear is in good condition. He works with patrol quartermasters as they check out equipment and return it, and at meetings of the patrol leaders’ council he reports on the status of equipment in need of replacement or repair. In carrying out his responsibilities, he may have the guidance of a member of the troop committee.',                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'TG',
                        'position_name' => 'Troop Guide',
                        'position_description' => 'The troop guide is both a leader and a mentor to the members of the new-Scout patrol. He should be an older Scout who holds at least the First Class rank and can work well with younger Scouts. He helps the patrol leader of the new-Scout patrol in much the same way that a Scoutmaster works with a senior patrol leader to provide direction, coaching, and support. The troop guide is not a member of another patrol but may participate in the high-adventure activities of a Venture patrol.',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'CA',
                        'position_name' => 'Chaplain Aide',
                        'position_description' => 'The chaplain aide assists the troop chaplain (usually an adult from the troop committee or the chartered organization) in serving the religious needs of the troop. He ensures that religious holidays are considered during the troop’s program planning process and promotes the BSA’s religious emblems program.',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'SC',
                        'position_name' => 'Scribe',
                        'position_description' => 'The scribe is the troop’s secretary. Though not a voting member, he attends meetings of the patrol leaders’ council and keeps a record of the discussions. He cooperates with the patrol scribes to record attendance and dues payments at troop meetings and to maintain troop advancement records. A member of the troop committee may assist him with his work.',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'HI',
                        'position_name' => 'Historian',
                        'position_description' => 'The historian collects and preserves troop photographs, news stories, trophies, flags, scrapbooks, awards, and other memorabilia and makes materials available for Scouting activities, the media, and troop history projects.',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'WM',
                        'position_name' => 'Webmaster',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'BU',
                        'position_name' => 'Bugler',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'DC',
                        'position_name' => 'Den Chief',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
                    array( 
                        'position_code' => 'WDC',
                        'position_name' => 'Webelos Den Chief',
                        'type' => 'Scout',
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                    ),
		); 
                

		
		// Uncomment the below to run the seeder
		DB::table('positions')->insert($positions);
	}

}
