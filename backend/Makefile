up:
	docker-compose up nginx

silent:
	docker-compose up nginx -d

clean:
	docker-compose down

rebuild: clean
	docker-compose up nginx --build

rebuild-silent: clean
	docker-compose up nginx -d --build

# ---------------------------
# Composer
# ---------------------------
composer-create:
	docker-compose run --rm composer create-project laravel/laravel .

composer-install:
	docker-compose run --rm composer install

composer-dump:
	docker-compose run --rm composer dump-autoload

# ---------------------------
# Artisan
# ---------------------------
migrate:
	docker-compose run --rm artisan migrate

migrate-fresh:
	docker-compose run --rm artisan migrate:fresh

seed:
	docker-compose run --rm artisan db:seed

fresh-seed:
	docker-compose run --rm artisan migrate:fresh --seed

tinker:
	docker-compose run --rm artisan tinker
