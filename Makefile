DC=docker-compose
DCEXEC=${DC} exec
DCEXEC_PHP=${DCEXEC} -u 1000 php

up:
	${DC} up -d --build

down:
	${DC} down

bash:
	${DCEXEC_PHP} bash

composer:
	${DC} run --rm -u 1000 composer bash

composer-install:
	${DC} run --rm -u 1000 composer composer install