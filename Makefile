sail-init:
	alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
up:
	./vendor/bin/sail up -d
sail-build:
	./vendor/bin/sail build --no-cache && ./vendor/bin/sail up -d
down:
	./vendor/bin/sail down
init:
	composer install
	@make key
	@make up
	@make down
	@make up
	@make migrate
	@make fresh
destroy:
	./vendor/bin/sail down --rmi all -v
	docker system prune --volumes -f
share:
	./vendor/bin/sail share
logs:
	./vendor/bin/sail logs
ci:
	composer update && composer install
dev-container:
	./vendor/bin/sail artisan sail:install --devcontainer
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
	./vendor/bin/sail logs mysql
log-db-watch:
	./vendor/bin/sail logs --follow mysql
app:
	./vendor/bin/sail bash
migrate:
	./vendor/bin/sail artisan migrate
roll:
	./vendor/bin/sail artisan migrate:rollback
fresh:
	./vendor/bin/sail artisan migrate:fresh
seed:
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
	php artisan key:generate
optimize:
	php artisan optimize
optimize-clear:
	php artisan optimize:clear
cache:
	@make optimize
	@make optimize-clear
	composer dump-autoload
	php artisan event:cache
	php artisan event:clear
	php artisan view:cache
	php artisan view:clear
	php artisan clear-compiled
	php artisan cache:clear
	php artisan config:clear
	php artisan route:cache
	php artisan route:clear
db:
	./vendor/bin/sail exec mysql bash
sql:
	./vendor/bin/sail exec mysql bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
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
watch:
	npm run watch
lint:
	watch 'npm run lint'
format:
	npm run format
cron:
	crontab -e
sche-run:
	./vendor/bin/sail artisan schedule:run
sche-list:
	./vendor/bin/sail artisan schedule:list
sche-work:
	./vendor/bin/sail artisan schedule:work
prod:
	git push heroku master
h-bash:
	heroku run bash
h-fresh:
	heroku run php artisan migrate:fresh
h-stg:
	heroku git:remote --app comiee15-stg
h-pro:
	heroku git:remote --app comiee15
sw-test:
	docker run --net="host" --rm -it stripe/stripe-cli listen --forward-connect-to http://localhost/stripe/webhook --api-key sk_test_51KgqQyFVoBD8yaq4Zvc7SUffJyPggJN77hpXY3LYa4c4yTJ95TtJ9pIRXmrxsXrNTrkeDlQLk1uzbX5KpWDXnXx700gi5J2XF3
sw-test-post:
	docker run --rm -it stripe/stripe-cli trigger checkout.session.completed --stripe-account=acct_1KgqQyFVoBD8yaq4 --api-key sk_test_51KgqQyFVoBD8yaq4Zvc7SUffJyPggJN77hpXY3LYa4c4yTJ95TtJ9pIRXmrxsXrNTrkeDlQLk1uzbX5KpWDXnXx700gi5J2XF3
