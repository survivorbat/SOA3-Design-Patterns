#!/bin/sh

hooks:
	git config core.hooksPath .githooks

install:
	composer install -d src

update:
	composer update -d src

run:
	docker-compose up -d

stop:
	docker-compose down
