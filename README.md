Shopify - clone

![image](https://user-images.githubusercontent.com/72369942/127765551-4a835810-211e-4724-a28c-c84112b84da9.png)
{Images from Admin pages}

![image](https://user-images.githubusercontent.com/72369942/127765608-796f9645-a877-4948-8358-a5e1fb23adb3.png)
{Images from Site pages}


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
