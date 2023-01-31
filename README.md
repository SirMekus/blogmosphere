## Installation

On your local machine:

1. Clone this repository
1. Run composer install
1. Create and fill the .env file (example included /.env-example)
1. Run `php artisan migrate` to create database tables
1. Seed the database by running `php artisan db:seed --class=ArticleSeeder`.
1. Seed the database by running `php artisan db:seed --class=TagSeeder`.
1. Run `php artisan storage:link`