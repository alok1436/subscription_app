## About Laravel wallet
 
Subscription platform refers creating the posts into a specific website where users can subscribe into particular website. Once they subcribe they will get start receiving notifications if any new post published.

## Install & setup

composer install

## .env file setup

cp .env.example .env

Change the database name, user and password

Change the smtp details to getting the notifications

## Run migrations

php artisan migrate

## Start the server

php artisan serve
php artisan queue:work
php artisan schedule:work

### API uses
 
 You can find the postman collection document into the root of project directory. You can import into postman and start interecting with the apis.

## Contributing

Thank you for considering contributing to the Subscription app