web: vendor/bin/heroku-php-apache2 public/
release: php artisan migrate:rollback --force
release: php artisan migrate --seed --force