release: php artisan migrate --force && php artisan optimize && php artisan optimize:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache
web: vendor/bin/heroku-php-nginx -i .user.ini public/
