DC=docker-compose
DCEXEC=${DC} exec -u 1000
DCEXEC_PHP=${DCEXEC} php
DCRUN_NODE=${DC} run --rm -u 1000 node

up:
	${DC} up -d --build

down:
	${DC} down

bash:
	${DCEXEC_PHP} bash

composer-install:
	${DCEXEC_PHP} composer install

queue:
	${DCEXEC} queue bash

queue-restart:
	${DCEXEC} queue php artisan queue:restart

npm-install:
	${DCRUN_NODE} npm install

npm-run-dev:
	${DCRUN_NODE} npm run dev

npm-run-prod:
	${DCRUN_NODE} npm run production

npm-run-watch:
	${DCRUN_NODE} npm run watch

php-cs-fix:
	${DCEXEC_PHP} vendor/bin/php-cs-fixer fix