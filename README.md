## 🤗 Requirements

```
    *  PHP >= 7.3 
    *  Laravel >= 8.0 
    *  Composer
```



## 👏 Installation:

```
    composer install

    npm install
```



## Configure  .env

- Copy .env.example to .env
- Setup for sqlite database
  - Create database.sqlite at database folder

```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE='absolute/path/to/database.sqlite'
```



## Database (SQLite): 

- Create table in sqlite database

```
php artisan migrate
```




## Run

```
php artisan key:generate
php artisan serve
```
