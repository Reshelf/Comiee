release: php artisan optimize:clear && php artisan optimize && composer dump-autoload && php artisan migrate --force
web: vendor/bin/heroku-php-apache2 -i .user.ini public/
