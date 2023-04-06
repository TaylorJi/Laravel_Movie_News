#!/bin/bash

# Run database migrations and seed data
php artisan migrate --force
php artisan db:seed --force

# Start the Apache server
apache2-foreground
