release: php artisan optimize && php artisan optimize:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force
web: vendor/bin/heroku-php-apache2 -i .user.ini public/
