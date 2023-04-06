#!/bin/sh

# Source .env file
set -o allexport; . .env; set +o allexport

# Wait for MySQL
until timeout 1 bash -c "echo > /dev/tcp/$DB_HOST/$DB_PORT"; do
  echo 'Waiting for MySQL...'
  sleep 1
done
echo "MySQL is up"

# Create the database if it doesn't exist
echo "CREATE DATABASE IF NOT EXISTS ${DB_DATABASE}" | mysql -h $DB_HOST -P $DB_PORT -u $DB_USERNAME -p$DB_PASSWORD

# Run migrations and seed the database
php artisan migrate:refresh --seed

# Run the application
php artisan serve --host=0.0.0.0 --port=8000
