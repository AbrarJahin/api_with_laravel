# Logistics-API for iOS and Android Apps of Terra App

## Web URL - https://terra-app.com/

###Server Installation (AWS Linux env)

Corn job ( http://laravel.com/docs/5.1/scheduling ) needed to update the "partner_service_scheduling" table every day so that next job can be created autometically

```clj
cd var/www

git clone https://github.com/terra-app/logistics-API

cd logistics-API

composer install

set up .env file from .env.example and change the .env file to configurations,
run these below commands

php artisan key:generate

/////////////////////////////////

composer dump-autoload

php artisan migrate:rollback

-> if any problem occured

/////////////////////////////////

php artisan migrate:reset

php artisan migrate --seed
```

------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------

## API Documentation

------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
### Client Account
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------
No of total pages- 7

#### Page 1 of 7
------------------------------------------------------------------------------------------
##### Summary - List

Summary of last defined day's works, partner's name, average rating given to partner, total jobs done in that perios and total payout for those works.

###### Request

Request Type 	| URL to request
----------------|----------------------
POST 			| **base_url**/api/customer/list_summary

Body Field 				| Description
------------------------|------------
**login_name** 			| log_in name of the user
**access_token** 		| Token needed for next time API access
**no_of_day_to_show** 	| Data of the needed days, optional, default = 7
**data_per_page** 		| No of data per page, optional, default = 10
**current_page_no** 	| Current active page no, optional, default = 1

###### Response

```json
{
  "no_of_day_to_show": "7",
  "data_per_page": 10,
  "data": [],
  "current_page_no": "1",
  "total_page_no": 0,
  "showing_start": 0,
  "showing_end": 0,
  "total_no_of_data": 0
}
```

Field Name 				| Description
------------------------|------------
**no_of_day_to_show** 	| No of last day's data shown
**data_per_page** 		| No of data per page
**data** 				| Current page's data
**current_page_no**		| Current page's number
**total_page_no** 		| Total no of pages
**showing_start** 		| Current page's start data
**showing_end** 		| Current page's start data
**total_no_of_data**	| Total data available


##### Jobs - List



#### Page 2 of 7
------------------------------------------------------------------------------------------
##### Profile - Show

##### Profile - Update

#### Page 3 of 7
------------------------------------------------------------------------------------------
##### Inviting Friends (by mail or phone)

#### Page 4 of 7
------------------------------------------------------------------------------------------
##### Payment Statements - List

#### Page 5 of 7
------------------------------------------------------------------------------------------
##### How can we help

##### View Training Videos

##### Report issue with job

#### Page 6 of 7
------------------------------------------------------------------------------------------
##### Link to app

#### Page 7 of 7
------------------------------------------------------------------------------------------
##### Registration

###### Request

Request Type 	| URL to request
----------------|----------------------
POST 			| **base_url**/api/customer/register

Body Field 			| Description
--------------------|------------
**first_name** 		| User's First Name
**last_name** 		| User's Last Name
**login_name** 		| User's Login Name
**password** 		| User's password
**neighbourhood** 	| User's neighbourhood
**email** 			| User's Email

###### Response

```json
{
  "message": [
    "The login name has already been taken."
  ],
  "status": 0
}
```

Field Name 			| Description
--------------------|------------
**message** 		| Server Message about log out responce
**status** 			| true/false

##### Login

###### Request

Request Type 	| URL to request
----------------|----------------------
POST 			| **base_url**/api/customer/login

Body Field 			| Description
--------------------|------------
**login_name** 		| User login name
**password** 		| Password of the user

###### Response

```json
{
  "name": "Abrar Jahin",
  "login_name": "abrarjahin",
  "user_type": "customer",
  "access_token": "9e34573cd44f4daa98feabe131a4938056d967ec41def9dc1e1cdd3d63df40e02e045ff5f6b763fbc39dded0e5e9d8c736fa6d566fad9f169274e9e82d8e2109db79c6c66bfef73c8c4931842419938abe047b59c9ae8c98ab837638d502d51e89613cdc78fdf55da4b50677c6842b1cbc9c3354d7c3287e9d572868d833c42cddacbb163e991ef084ba2c9739716f7a714471586d72",
  "expires_on": {
    "date": "2015-11-07 08:12:57",
    "timezone_type": 3,
    "timezone": "UTC"
  }
}
```

Field Name 			| Description
--------------------|------------
**name** 			| User name
**login_name** 		| User login name
**user_type** 		| Type of the user
**access_token** 	| Token needed for next time API access
**expires_on** 		| Time of expire of the token


##### Logout

###### Request

Request Type 	| URL to request
----------------|----------------------
POST 			| **base_url**/api/customer/logout

Body Field 			| Description
--------------------|------------
**access_token** 	| Token needed for next time API access

###### Response

```json
{
  "message": "Log Out Successfully",
  "status": 1
}
```

Field Name 			| Description
--------------------|------------
**message** 		| Server Message about log out responce
**status** 			| true/false

------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------

### Partner Account
------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------

No of total pages- 7

------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------