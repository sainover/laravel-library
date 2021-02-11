DC=docker-compose
DCEXEC=${DC} exec -u 1000
DCEXEC_PHP=${DCEXEC} php

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