ТЕСТОВОЕ ЗАДАНИЕ "Светофор"

.env файл - конфигурация БД
```sh
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=traffic_light_test
DB_USERNAME=root
DB_PASSWORD=password
```

Запуск с помощью Makefile:
```sh
make env - для создания и копировния из .env.example в .env, для Windows - cp .env.example .env
make build - для билда контейнеров
make up - для поднятия контейнеров
make vendor - для composer install
make key - для генерации ключа
make migrate - для запуска миграций
make npm-install - для npm install
make npm-build - для сборки js
```

Запуск с помощью docker-compose:
```sh
cp -n .env.example .env - для создания и копировния из .env.example в .env, для Windows - cp .env.example .env
docker-compose build - для билда контейнеров
docker-compose up -d - для поднятия контейнеров
docker-compose exec -it app composer install - для composer install
docker-compose exec -it app php artisan key:generate - для генерации ключа
docker-compose exec -it app php artisan migrate - для запуска миграций
docker-compose exec -it node npm install - для npm install
docker-compose exec -it node npm run build - для сборки js
```

