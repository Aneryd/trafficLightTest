# Makefile

env: 
	cp -n .env.example .env

key:
	docker compose exec -it app php artisan key:generate

build:
	docker compose build

up:
	docker compose up -d

sh:
	docker compose exec -it app bash

vendor:
	docker compose exec -it app composer install

migrate:
	docker compose exec -it app php artisan migrate

migrate-refresh:
	docker compose exec -it app php artisan migrate:refresh --seed

down:
	docker compose down

npm-install:
	docker compose exec -it node npm install

npm-build:
	docker compose exec -it node npm run build

node:
	docker compose exec -it node bash