# ---------------------------
# Frontend
# ---------------------------
create-project:
	docker-compose run --rm vite
install:
	docker-compose run --rm node-runner npm install
up:
	docker-compose up dev
silent:
	docker-compose up -d dev
stage:
	docker-compose run --rm node-runner run build
lint:
	docker-compose run --rm node-runner npm run lint
down:
	docker-compose down
drop:
	docker-compose down -v
build:
	docker-compose build
node-run:
	docker-compose run --rm node-runner
build-css:
	docker-compose run --rm node-runner npx postcss src/style.css -o dist/style.css
