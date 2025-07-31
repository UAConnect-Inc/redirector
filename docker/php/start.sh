#!/usr/bin/env bash

role=${CONTAINER_ROLE:-app}

if [ "$role" = "app" ]; then
    composer install

    #php artisan key:generate &&
#    php artisan migrate --seed --force
    #truncate user socket connection info
#    php artisan system:cleanup:clean-socket

    chmod -R a+rw storage/
    chmod -R a+rw bootstrap/cache/

    echo "Running the php-fpm..."
    exec php-fpm
elif [ "$role" = "queue" ]; then
    composer install

    echo "Running the queue..."
    nohup supervisord -c /etc/supervisor/supervisord.conf > /dev/null 2>&1 &
    touch /var/www/html/storage/logs/queue.log
    tail -f -n 1500 /var/www/html/storage/logs/queue.log
elif [ "$role" = "scheduler" ]; then
    echo "Running scheduler..."
    while [ true ]
    do
      php /var/www/html/artisan schedule:run --verbose --no-interaction & sleep 60
    done
else
    echo "Could not match the container role \"$role\""
    exit 1
fi


