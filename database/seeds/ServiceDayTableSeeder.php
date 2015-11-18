<?php

use Illuminate\Database\Seeder;

class ServiceDayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service_days = [
							[
								'id' 		=> 1,
								'day_name' 	=> 'Saturday',
							],
							[
								'id' 		=> 2,
								'day_name' 	=> 'Sunday',
							],
							[
								'id' 		=> 3,
								'day_name' 	=> 'Monday',
							],
							[
								'id' 		=> 4,
								'day_name' 	=> 'Tuesday',
							],
							[
								'id' 		=> 5,
								'day_name' 	=> 'Wednesday',
							],
							[
								'id' 		=> 6,
								'day_name' 	=> 'Thursday',
							],
							[
								'id' 		=> 7,
								'day_name' 	=> 'Friday',
							],
						];
    	foreach ($service_days as $service_day)
    	{
    		DB::table('service_day')->insert(
    		[
	            'id' 			=> $service_day['id'],
	            'day_name' 		=> $service_day['day_name'],
	        ]);
    	}
    }
}
