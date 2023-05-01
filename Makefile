sail-init:
	alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
up:
	docker-compose up -d
docker-build:
	docker-compose build --no-cache && docker-compose up -d
down:
	docker-compose down
init:
	composer install
	@make key
	@make docker-build
	@make down
	@make up
	@make migrate
	@make fresh
destroy:
	docker-compose down --rmi all -v
	docker system prune --volumes -f
share:
	docker-compose exec laravel.test share
logs:
	docker-compose exec laravel.test logs
ci:
	composer update && composer install
dev-container:
	docker-compose exec laravel.test php artisan sail:install --devcontainer
master:
	git fetch && git pull origin master && git push
logs-watch:
	docker-compose exec laravel.test logs --follow
log-web:
	docker-compose exec laravel.test logs web
log-web-watch:
	docker-compose exec laravel.test logs --follow web
log-app:
	docker-compose exec laravel.test logs app
log-app-watch:
	docker-compose exec laravel.test logs --follow app
log-db:
	docker-compose exec laravel.test logs mysql
log-db-watch:
	docker-compose exec laravel.test logs --follow mysql
app:
	docker-compose exec laravel.test bash
migrate:
	docker-compose exec laravel.test php artisan migrate
roll:
	docker-compose exec laravel.test php artisan migrate:rollback
fresh:
	docker-compose exec laravel.test php artisan migrate:fresh
seed:
	docker-compose exec laravel.test php artisan db:seed --class UserSeeder
	docker-compose exec laravel.test php artisan db:seed --class BookSeeder
dacapo:
	docker-compose exec laravel.test php artisan dacapo
refresh:
	docker-compose exec laravel.test php artisan migrate:refresh
tinker:
	php artisan tinker
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
	docker-compose exec laravel.test exec mysql bash
sql:
	docker-compose exec laravel.test exec mysql bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
redis:
	docker-compose exec laravel.test exec redis redis-cli
composer-clear:
	composer self-update
	composer update
	composer install
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
	docker-compose exec laravel.test php artisan schedule:run
sche-list:
	docker-compose exec laravel.test php artisan schedule:list
sche-work:
	docker-compose exec laravel.test php artisan schedule:work
h-master:
	git push heroku master
h-log:
	heroku logs --tail
h-bash:
	heroku run bash
h-fresh:
	heroku run php artisan migrate:fresh
h-stg:
	heroku git:remote --app comiee15-stg
h-pro:
	heroku git:remote --app comiee15
ja-csv:
	cat resources/lang/ja.json | jq -r  > ja.csv
en-csv:
	cat resources/lang/en.json | jq -r  > en.csv
update:
	 npx -p npm-check-updates  -c "ncu -u"
	@make package-clear-legacy
	@make ci
package-clear-legacy:
	npm install --legacy-peer-deps
	npm audit fix --force
sail-art-about:
	docker-compose exec laravel.test art about
# 更新可能のパッケージ
composer-outdated:
	composer outdated -D
# e22テスト
e2e-open:
	npm run e2e:open
e2e-run:
	npm run e2e:run
backup-local:
	 docker-compose exec laravel.test php artisan backup:run
backup-production:
	 php artisan backup:run
autogpt:
	 cd ../AutoGPT && python3 -m autogpt --continuous
