## Logistics-API for iOS and Android Apps of Terra App

# Web URL - https://terra-app.com/

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

