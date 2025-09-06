# Backend Setup

To run the Laravel backend with Docker, follow these steps:

1. **Start the containers**
   ```bash
   make up
This will start Nginx (and other services defined in docker-compose.yml).

2. **Install Laravel via Composer**
   ```bash
    make compose
This will create a new Laravel project inside the container.

3. **Run database migrations**
   ```bash
    make migrate
After completing these steps, the backend will be ready to use.

***Tip:***
To run containers in detached mode, use make silent.  
To rebuild containers, use make rebuild or make rebuild-silent.