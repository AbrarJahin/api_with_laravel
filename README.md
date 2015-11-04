# Logistics-API for iOS and Android Apps of Terra App

## Web URL - https://terra-app.com/

###Server Installation (AWS Linux env)

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

##### Login

###### Request Type
POST

####### Variables-
login_name

password

##### Response

{

  "name": "Abrar Jahin",

  "user_type": "customer",

  "access_token": "c139f791979281367aa2b6d6786206dbd41ef17a746213b4519bdea306a9025c47829654f348d38dc85cd96aebc2c471fc668b3f68c8fe7062e4c6223c1b274fbcee1d19d96ee4559c85f8e71fa0b2f6b7e1bcbf0a239fb157241a32e5d4bcc24e9a8a9c047d79b6d5b7b2039220955d56b70df7412fe65f4046f74fe6f05c606ebec0d21b2962aa6767b280d22a306f59c579661440",

  "expires_on": {

    "date": "2015-11-07 04:21:38",

    "timezone_type": 3,

    "timezone": "UTC"

  }

}

"access_token" and "login_name" should be stored and need to be used for any farther API call in the server
"expires_on" is the time when current access_token would be expired

##### Registration



##### Logout

POST | **base_url**/api/customer/login

Field | Description
------|------------
**access_token** | The item's unique id.
**login_name** | `true` if the item is deleted.

##### Response

```json
{
  "name": "Abrar Jahin",
  "user_type": "customer",
  "access_token": "c139f791979281367aa2b6d6786206dbd41ef17a746213b4519bdea306a9025c47829654f348d38dc85cd96aebc2c471fc668b3f68c8fe7062e4c6223c1b274fbcee1d19d96ee4559c85f8e71fa0b2f6b7e1bcbf0a239fb157241a32e5d4bcc24e9a8a9c047d79b6d5b7b2039220955d56b70df7412fe65f4046f74fe6f05c606ebec0d21b2962aa6767b280d22a306f59c579661440",
  "expires_on": {
    "date": "2015-11-07 04:21:38",
    "timezone_type": 3,
    "timezone": "UTC"
  }
}
```