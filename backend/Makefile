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
composer-create:
	docker-compose run --rm composer create-project laravel/laravel .
composer-install:
	docker-compose run --rm composer install
migrate:
	docker-compose run --rm artisan migrate