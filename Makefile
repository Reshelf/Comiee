up:
	./vendor/bin/sail up -d
deploy:
	serverless deploy
remove:
	serverless remove
down:
	./vendor/bin/sail down --rmi all -v
destroy:
	./vendor/bin/sail down --rmi all --volumes --remove-orphans
logs:
	./vendor/bin/sail logs
ci:
	./vendor/bin/sail composer update && ./vendor/bin/sail composer install
master:
	git fetch && git pull origin master && git push
logs-watch:
	./vendor/bin/sail logs --follow
log-web:
	./vendor/bin/sail logs web
log-web-watch:
	./vendor/bin/sail logs --follow web
log-app:
	./vendor/bin/sail logs app
log-app-watch:
	./vendor/bin/sail logs --follow app
log-db:
	./vendor/bin/sail logs db
log-db-watch:
	./vendor/bin/sail logs --follow db
app:
	./vendor/bin/sail bash
migrate:
	./vendor/bin/sail artisan migrate
fresh:
	./vendor/bin/sail artisan migrate:fresh
seed:
	./vendor/bin/sail artisan migrate:fresh
	./vendor/bin/sail artisan db:seed --class UserSeeder
	./vendor/bin/sail artisan db:seed --class BookSeeder
dacapo:
	./vendor/bin/sail artisan dacapo
refresh:
	./vendor/bin/sail artisan migrate:refresh
tinker:
	./vendor/bin/sail artisan tinker
key:
	cp .env.example .env
	./vendor/bin/sail artisan key:generate
optimize:
	./vendor/bin/sail artisan optimize
optimize-clear:
	./vendor/bin/sail artisan optimize:clear
cache:
	@make optimize
	@make optimize-clear
	./vendor/bin/sail composer dump-autoload -o
	./vendor/bin/sail artisan event:cache
	./vendor/bin/sail artisan event:clear
	./vendor/bin/sail artisan view:cache
	./vendor/bin/sail artisan view:clear
	./vendor/bin/sail composer dump-autoload
	./vendor/bin/sail artisan clear-compiled
	./vendor/bin/sail artisan cache:clear
	./vendor/bin/sail artisan config:cache
	./vendor/bin/sail artisan config:clear
	./vendor/bin/sail artisan route:cache
	./vendor/bin/sail artisan route:clear
	./vendor/bin/sail composer clear-cache
db:
	./vendor/bin/sail exec db bash
sql:
	./vendor/bin/sail exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
redis:
	./vendor/bin/sail exec redis redis-cli
composer-clear:
	./vendor/bin/sail rm -Rf vendor/
	./vendor/bin/sail rm composer.lock
	./vendor/bin/sail composer self-update
	./vendor/bin/sail composer update
	./vendor/bin/sail composer install
reset:
	rm -rf node_modules
	rm package-lock.json
	npm cache clear --force
	npm cache clean --force
	npm i
dev:
	npm run dev
build:
	npm run build
