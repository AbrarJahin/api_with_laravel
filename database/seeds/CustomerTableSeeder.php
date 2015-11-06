<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
						[
							'user_id' 					=> 2,
							'email' 					=> 'anything@something.com',
							'is_email_verified' 		=> 'yes',
						],
						[
							'user_id' 					=> 3,
							'email' 					=> 'something@anything.com',
							'is_email_verified' 		=> 'no',
						],
						[
							'user_id' 					=> 4,
							'email' 					=> 'nothing@something.com',
							'is_email_verified' 		=> 'yes',
						],
	    			];
    	foreach ($customers as $customer)
    	{
    		DB::table('customers')->insert(
    		[
	            'user_id' 					=> $customer['user_id'],
	            'neighbourhood' 			=> bin2hex(random_bytes(5)),
	            'email' 					=> $customer['email'],
	            'is_email_verified' 		=> $customer['is_email_verified'],
	            'stripe_id' 				=> bin2hex(random_bytes(30)),
	        ]);
    	}
    }
}
