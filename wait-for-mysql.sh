set -e
set -x

host="$1"
shift
cmd="$@"

until mysql -h "$host" -u ${MYSQL_USER} ${MYSQL_DATABASE} -e 'use insight'; do
  >&2 echo "MySQL is unavailable - sleeping"
  sleep 1
done

>&2 echo "Mysql is up - executing command"

php artisan key:generate
php artisan migrate:fresh --seed
php artisan cache:clear
php artisan serve --host=0.0.0.0 --port=8000