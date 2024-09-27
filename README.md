<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Логотип Laravel"></a></p>

# Стартовый набор для Laravel Docker
- Laravel v11.x
- PHP v8.3.x
- MySQL v8.1.x (по умолчанию)
- MariaDB v10.11.x
- PostgreSQL v16.x
- pgAdmin v4.x
- phpMyAdmin v5.x
- Mailpit v1.x
- Node.js v18.x
- NPM v10.x
- Yarn v1.x
- Vite v5.x
- Rector v1.x
- Redis v7.2.x

# Требования
- Стабильная версия [Docker](https://docs.docker.com/engine/install/)
- Совместимая версия [Docker Compose](https://docs.docker.com/compose/install/#install-compose)

# Как развернуть

### Только при первом запуске!
- `git clone https://github.com/refactorian/laravel-docker.git`
- `cd laravel-docker`
- `docker compose up -d --build`
- `docker compose exec phpmyadmin chmod 777 /sessions`
- `docker compose exec php bash`
- `chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache`
- `chmod -R 775 /var/www/storage /var/www/bootstrap/cache`
- `composer setup`

### При последующих запусках
- `docker compose up -d`

# Примечания

### Версии Laravel
- [Laravel 11.x](https://github.com/refactorian/laravel-docker/tree/main)
- [Laravel 10.x](https://github.com/refactorian/laravel-docker/tree/laravel_10x)

### Приложение Laravel
- URL: http://localhost

### Mailpit
- URL: http://localhost:8025

### phpMyAdmin
- URL: http://localhost:8080
- Сервер: `db`
- Логин: `refactorian`
- Пароль: `refactorian`
- База данных: `refactorian`

### Adminer
- URL: http://localhost:9090
- Сервер: `db`
- Логин: `refactorian`
- Пароль: `refactorian`
- База данных: `refactorian`

### Основные команды Docker Compose
- Построить или перестроить сервисы:
  - `docker compose build`
- Создать и запустить контейнеры:
  - `docker compose up -d`
- Остановить и удалить контейнеры, сети:
  - `docker compose down`
- Остановить все сервисы:
  - `docker compose stop`
- Перезапустить контейнеры сервисов:
  - `docker compose restart`
- Выполнить команду в контейнере:
  - `docker compose exec [container] [command]`

### Полезные команды Laravel
- Показать основную информацию о приложении:
  - `php artisan about`
- Удалить файл кеша конфигурации:
  - `php artisan config:clear`
- Очистить кеш приложения:
  - `php artisan cache:clear`
- Очистить все закешированные события и слушатели:
  - `php artisan event:clear`
- Удалить все задания из указанной очереди:
  - `php artisan queue:clear`
- Удалить файл кеша маршрутов:
  - `php artisan route:clear`
- Очистить все скомпилированные представления:
  - `php artisan view:clear`
- Удалить скомпилированные классы:
  - `php artisan clear-compiled`
- Удалить закешированные файлы bootstrap:
  - `php artisan optimize:clear`
- Удалить кеш-файлы, созданные планировщиком:
  - `php artisan schedule:clear-cache`
- Очистить устаревшие токены сброса паролей:
  - `php artisan auth:clear-resets`

### Laravel Pint (исправление стиля кода | PHP-CS-Fixer)
- Отформатировать все файлы:
  - `vendor/bin/pint`
- Отформатировать конкретные файлы или директории:
  - `vendor/bin/pint app/Models`
  - `vendor/bin/pint app/Models/User.php`
- Отформатировать все файлы с предварительным просмотром:
  - `vendor/bin/pint -v`
- Отформатировать некоммитированные изменения по Git:
  - `vendor/bin/pint --dirty`
- Проверить все файлы:
  - `vendor/bin/pint --test`

### Rector
- Пробный запуск:
  - `vendor/bin/rector process --dry-run`
- Обработка файлов:
  - `vendor/bin/rector process`


### Создание пользователя Orchid
 - php artisan orchid:admin admin admin@admin.com admin@admin.com
