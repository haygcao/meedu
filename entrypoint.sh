#!/bin/sh

set -e

if [ "$1" = 'php' ] && [ "$(id -u)" = '0' ]; then
    chown -R www-data /meedu
fi

if [ ! -e '/meedu/public/index.php' ]; then
    cp -a /app/meedu/* /meedu/
    cp -a /app/meedu/.env /meedu/
fi

exec "$@"