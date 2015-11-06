<?php

use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = [
						[
							'user_id' 			=> 5,		//str_random(10)
				            'type_of_phone' 	=> 'Android',
				            'is_18_years_old' 	=> 'yes',
						],
						[
							'user_id' 			=> 6,		//str_random(10)
				            'type_of_phone' 	=> 'iOS',
				            'is_18_years_old' 	=> 'no',
						],
						[
							'user_id' 			=> 7,		//str_random(10)
				            'type_of_phone' 	=> 'Other',
				            'is_18_years_old' 	=> 'yes',
						]
	    			];
    	foreach ($partners as $partner)
    	{
    		DB::table('partners')->insert(
    		[
	            'user_id' 			=> $partner['user_id'],		//str_random(10)
	            'company_name' 		=> bin2hex(random_bytes(3)),
	            'type_of_phone' 	=> $partner['type_of_phone'],
	            'is_18_years_old' 	=> $partner['is_18_years_old'],
	        ]);
    	}
    }
}
