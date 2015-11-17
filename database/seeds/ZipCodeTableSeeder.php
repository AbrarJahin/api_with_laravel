<?php

use Illuminate\Database\Seeder;

class ZipCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zip_codes = [
						[
							'zip_code' 					=> '5001',
							'type' 						=> 'UNIQUE',
							'primary_city' 				=> 'IkJsAnything',
							'acceptable_cities' 		=> 'YesYa',
						],
						[
							'zip_code' 					=> '2342',
							'type' 						=> 'STANDARD',
							'primary_city' 				=> 'RhdfWhy',
							'acceptable_cities' 		=> 'NoYa',
						],
						[
							'zip_code' 					=> '4562',
							'type' 						=> 'PO BOX',
							'primary_city' 				=> 'WeAnything',
							'acceptable_cities' 		=> 'Yes',
						],
						[
							'zip_code' 					=> '4356',
							'type' 						=> 'STANDARD',
							'primary_city' 				=> 'AdAnything',
							'acceptable_cities' 		=> 'Ya',
						],
						[
							'zip_code' 					=> '7893',
							'type' 						=> 'PO BOX',
							'primary_city' 				=> 'NoAnything',
							'acceptable_cities' 		=> '',
						],
	    			];
    	foreach ($zip_codes as $zip_code)
    	{
    		DB::table('zip_codes')->insert(
	        [
	        	'zip_code' 					=> $zip_code['zip_code'],
	        	'type' 						=> $zip_code['type'],
	        	'primary_city' 				=> $zip_code['primary_city'],
	        	'acceptable_cities' 		=> $zip_code['acceptable_cities'],
	        ]);
    	}
    }
}
