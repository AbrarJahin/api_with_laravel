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
						"id" 			=> 1,
						"first_name" 	=> "Admin",
						"last_name" 	=> "Admin",
						"login_name" 	=> "admin",
						"password" 		=> "pass",
						"user_type" 	=> "admin"
					],
					[
						"id" 			=> 2,
						"first_name" 	=> "Abrar",
						"last_name" 	=> "Jahin",
						"login_name" 	=> "abrar",
						"password" 		=> "pass",
						"user_type" 	=> "customer"
					],
					[
						"id" 			=> 3,
						"first_name" 	=> "Abrar",
						"last_name" 	=> "Jahin",
						"login_name" 	=> "jahin",
						"password" 		=> "pass",
						"user_type" 	=> "customer"
					],
					[
						"id" 			=> 4,
						"first_name" 	=> "Abrar",
						"last_name" 	=> "Jahin",
						"login_name" 	=> "abrarjahin",
						"password" 		=> "pass",
						"user_type" 	=> "customer"
					],
					[
						"id" 			=> 5,
						"first_name" 	=> "Abrar",
						"last_name" 	=> "Hasin",
						"login_name" 	=> "pranto",
						"password" 		=> "pass",
						"user_type" 	=> "partner"
					],
					[
						"id" 			=> 6,
						"first_name" 	=> "Abrar",
						"last_name" 	=> "Hasin",
						"login_name" 	=> "hasin",
						"password" 		=> "pass",
						"user_type" 	=> "partner"
					],
					[
						"id" 			=> 7,
						"first_name" 	=> "Abrar",
						"last_name" 	=> "Hasin",
						"login_name" 	=> "abrarhasin",
						"password" 		=> "pass",
						"user_type" 	=> "partner"
					]
    			];
    	foreach ($users as $user)
    	{
    		DB::table('users')->insert(
    		[
	            'id' 			=> $user['id'],		//str_random(10)
	            'first_name' 	=> $user['first_name'],		//str_random(10)
	            'last_name' 	=> $user['last_name'],
	            'login_name' 	=> $user['login_name'],
	            'password' 		=> bcrypt($user['password']),
	            'user_type' 	=> $user['user_type'],
	            'referal_code' 	=> bin2hex(random_bytes(30))
	        ]);
    	}
    }
}
