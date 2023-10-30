## Build a environment
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

./vendor/bin/sail up
or
./vendor/bin/sail up -d

# sail up の後に.envがなければコピーする。いらないかも？
cp .env.example .env
```

## Install packages
```
# php packages
./vendor/bin/sail composer install
# js packages
./vendor/bin/sail npm install
```

## Create database and tables and Insert dummy data
```
./vendor/bin/sail artisan migrate --seed
```

## Run vite
```
# run a dev server
./vendor/bin/sail npm run dev
# build resoureces
./vendor/bin/sail npm run build
```

## Link
[http://localhost/todos/](http://localhost/todos/)
