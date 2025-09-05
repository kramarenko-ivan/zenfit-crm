up:
	docker-compose up nginx
silent:
	docker-compose up nginx -d
clean:
	docker-compose down -v
rebuild: clean
	docker-compose up nginx --build
rebuild-silent: clean
	docker-compose up nginx -d --build
compose:
	docker-compose run --rm composer create-project laravel/laravel .
migrate:
	docker-compose run --rm artisan migrate