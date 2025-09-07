# ---------------------------
# Frontend
# ---------------------------

# Initialize Vue project via Vite
create-project:
	docker-compose run --rm vite

# Install npm dependencies
install:
	docker-compose run --rm frontend npm install

# Start development server
up:
	docker-compose up frontend

# Start development server in background
silent:
	docker-compose up -d frontend

# Build project for production
build:
	docker-compose run --rm frontend npm run build

# Clean node_modules and reinstall dependencies
reinstall:
	docker-compose run --rm frontend sh -c "rm -rf node_modules package-lock.json && npm install"

# Run linter or other npm scripts
lint:
	docker-compose run --rm frontend npm run lint
