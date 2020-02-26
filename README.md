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

setup the project environment
```
cp .env.example .env
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
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

After updating the crontab. Restart your cron.
```
sudo service cron restart
```

Always turn on your queue for the task scheduler for import fantasty league to work.
```
php artisan queue:work --tries=3
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
