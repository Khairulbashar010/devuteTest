Create an account on mailtrap.io to test the mail service. And make sure to run the project on localhost:8000.

Clone the project and open the directory. Copy the .env.example file and rename the new to .env
Set database name to your desired and configure the mail server using your mailtrap credentials.

Then run the following commands:

    composer install
    npm install
    php artisan key:generate
    php artisan migrate --seed

These commands should be kept running.
    php artisan serve
    php artisan queue:listen

Finaly run
    php artisan optimize

Two users will be seeded in the database.
    1. admin@gmail.com
    2. user@gmail.com
Password for both is 123456788.
Only a new user can be registered through the registration system.
A new admin cannot be registered.

There might be an error if the app doesn't run on port 8000
