download composer dependencies
```sh
composer install
```

download npm dependencies
```sh
npm install
```

create .env file, in directory.

generate application key
```sh
php artisan key:generate
```

create sym-link to public
```sh
php artisan storage:link
```

create database
```sh
php artisan migrate:fresh -seed
```

start the server
```sh
php artisan serve && npm run dev
```

done :)
