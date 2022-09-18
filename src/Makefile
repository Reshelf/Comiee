create-project:
	mkdir -p src
	@make build
	@make up
	@make laravel-install
	php artisan key:generate
	php artisan storage:link
	chmod -R 777 storage bootstrap/cache
	@make fresh
install-recommend-packages:
	composer require doctrine/dbal
	composer require --dev ucan-lab/laravel-dacapo
	composer require --dev barryvdh/laravel-ide-helper
	composer require --dev beyondcode/laravel-dump-server
	composer require --dev barryvdh/laravel-debugbar
	composer require --dev roave/security-advisories:dev-master
	php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
run:
	npm i
	npm run dev && npm run watch-poll
migrate:
	php artisan migrate
fresh:
	php artisan migrate:fresh --seed
refresh:
	php artisan migrate:refresh --seed
seed:
	php artisan migrate:fresh
	php artisan db:seed --class UserSeeder
	php artisan db:seed --class BookSeeder
dacapo:
	php artisan dacapo
tinker:
	php artisan tinker
test:
	php artisan test
optimize:
	php artisan optimize
optimize-clear:
	php artisan optimize:clear
cache:
	composer dump-autoload
	php artisan clear-compiled
	@make optimize
	@make optimize-clear
	php artisan event:cache
	php artisan cache:clear
	php artisan config:clear
	php artisan view:cache
	php artisan route:cache
	@make cache-clear
cache-clear:
	composer clear-cache
	@make optimize-clear
	php artisan event:clear
route:
	php artisan route:list
dev:
	npm run dev
build:
	npm run build
lint:
	npm run lint
reset:
	rm -rf node_modules && rm package-lock.json && npm cache clear --force && npm cache clean --force && npm i
