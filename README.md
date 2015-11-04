# Logistics-API for iOS and Android Apps of Terra App

## Web URL - https://terra-app.com/

###Server Installation (AWS Linux env)

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

## API Documentation

### Client Account

No of total pages- 6

#### Page 1 of 6

##### Summary - List
API for summary

##### Jobs - List

#### Page 2 of 6

##### Profile - Show

##### Profile - Update

#### Page 3 of 6

##### Inviting Friends (by mail or phone)

#### Page 4 of 6

##### Payment Statements - List

#### Page 5 of 6

##### How can we help

##### View Training Videos

##### Report issue with job

#### Page 6 of 6

##### Link to app

#### Page 7 of 6

##### Registration



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
**access_token** 		| User login name

###### Response

```json
{
  "message": "User Not Logged In, so no need to log out",
  "status": 0
}
```

Field Name 			| Description
--------------------|------------
**message** 		| Server Message about log out responce
**status** 			| true/false