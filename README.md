# draglist
1. Clone the repo: git clone git@github.com:menvil/draglist.git
2. Install Laravel: composer install --prefer-dist
3. Change your database settings in app/config/database.php
4. Rename file .env.example to .env and dit file .env for proper database values

DB_HOST=localhost
DB_DATABASE=draglist
DB_USERNAME=root
DB_PASSWORD=

4. Migrate your database: php artisan migrate
5. Seed your database: php artisan db:seed --class=ListTableSeeder
6. Make php artisan key:generate
7. Make sure that "public" directory is the root directory
8. chmod -R 0777 bootstrap/cache
9. chmod -R 0777 storage/
10. View application in the browser!