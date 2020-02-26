# Fantasy Premier League Importer

Imports player data from fantasy league site.

## Getting Started

### Prerequisites

* Composer
* PHP

### Installing

Clone the project and change to project directory
```
git clone git@github.com:paulolorenzobasilio/fantasy-premier-league-importer.git
cd fantasy-premier-league-importer
```

install dependencies
```
composer install
```

configure the project environment
```
touch .env
```
Paste this into your .env
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

generate your own application key
```
php artisan key:generate
```

create database.sqlite also migrate & seed tables
```
touch database/database.sqlite
php artisan migrate --seed
```

Setup task scheduler. Copy paste this contents in your crontab
```
crontab (* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1)
&& queue:work
```

## Running the tests
```
vendor/bin/phpunit
```

## To run import fantasy-league command
```
php artisan import:fantasy-league
```

## Built With
* [Laravel](https://laravel.com/) - The web framework used