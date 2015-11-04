<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds for 'users' table
     *
     * @return void
     */
    public function run()
    {
        $users = [
					[
						"first_name" => "Admin",
						"last_name" => "Admin",
						"login_name" => "admin",
						"password" => "pass",
						"user_type" => "admin",
						"referal_code" => bin2hex(random_bytes(60))
					],
					[
						"first_name" => "Abrar",
						"last_name" => "Jahin",
						"login_name" => "abrarjahin",
						"password" => "pass",
						"user_type" => "customer",
						"referal_code" => bin2hex(random_bytes(60))
					],
					[
						"first_name" => "Abrar",
						"last_name" => "Hasin",
						"login_name" => "abrarhasin",
						"password" => "pass",
						"user_type" => "partner",
						"referal_code" => bin2hex(random_bytes(60))
					]
    			];
    	foreach ($users as $user)
    	{
    		DB::table('users')->insert(
    		[
	            'first_name' 	=> $user['first_name'],		//str_random(10)
	            'last_name' 	=> $user['last_name'],
	            'login_name' 	=> $user['login_name'],
	            'password' 		=> bcrypt($user['password']),
	            'user_type' 	=> $user['user_type'],
	            'referal_code' 	=> $user['referal_code'],
	        ]);
    	}
    }
}
