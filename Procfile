release: composer dump-autoload && php artisan clear-compiled && php artisan optimize && php artisan config:cache && composer install
web: vendor/bin/heroku-php-apache2 public/
