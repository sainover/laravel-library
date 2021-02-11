DC=docker-compose
DCEXEC=${DC} exec -u 1000
DCEXEC_PHP=${DCEXEC} php
DCRUN_NODE=${DC} run --rm -u 1000 node

up:
	${DC} up -d --build

down:
	${DC} down

install: up composer-install npm-install npm-run-dev migrate storage-link
	cp .env.example .env
	${DCEXEC_PHP} php artisan key:generate

# Exec bash in php service container
bash:
	${DCEXEC_PHP} bash

# Instal composer packages
composer-install:
	${DCEXEC_PHP} composer install

# Exec bash in queue service container
queue:
	${DCEXEC} queue bash

# Restart queue worker
queue-restart:
	${DCEXEC} queue php artisan queue:restart

# Create simylink for srorage
storage-link:
	${DCEXEC_PHP} php artisan storage:link

# Exec migrations
migrate:
	${DCEXEC_PHP} php artisan migrate

# Run npm
npm-install:
	${DCRUN_NODE} npm install

npm-run-dev:
	${DCRUN_NODE} npm run dev

npm-run-prod:
	${DCRUN_NODE} npm run production

npm-run-watch:
	${DCRUN_NODE} npm run watch

# Autofix codestyle
php-cs-fix:
	${DCEXEC_PHP} vendor/bin/php-cs-fixer fix