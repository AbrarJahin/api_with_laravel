<?php

use Illuminate\Database\Seeder;

class ServiceTimeTableSeeder extends Seeder
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
								'id' 					=> 1,
								'service_time_name' 	=> 'Morning 1',
							],
							[
								'id' 					=> 2,
								'service_time_name' 	=> 'Morning 2',
							],
							[
								'id' 					=> 3,
								'service_time_name' 	=> 'Noon 3',
							],
							[
								'id' 					=> 4,
								'service_time_name' 	=> 'Noon 4',
							],
							[
								'id' 					=> 5,
								'service_time_name' 	=> 'Afternoon 5',
							],
							[
								'id' 					=> 6,
								'service_time_name' 	=> 'Evening 6',
							],
							[
								'id' 					=> 7,
								'service_time_name' 	=> 'Night 7',
							],
						];
    	foreach ($service_days as $service_day)
    	{
    		DB::table('service_time')->insert(
    		[
	            'id' 					=> $service_day['id'],
	            'service_time_name' 	=> $service_day['service_time_name'],
	        ]);
    	}
    }
}
