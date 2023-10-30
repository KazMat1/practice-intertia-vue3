## Build a environment
```
./vendor/bin/sail up
or
./vendor/bin/sail up -d

# sail up の後に.envがなければコピーする。いらないかも？
cp .env.example .env
```

## Install packages
```
# php packages
composer install
# js packages
npm install
```

## Create database and tables and Insert dummy data
```
./vendor/bin/sail artisan migrate --seed
```

## Run vite
```
# run a dev server
npm run dev
# build resoureces
npm run build
```

## Link
[http://localhost/todos/](http://localhost/todos/)
