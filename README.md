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

##### Registration

##### Logout