# URL Shortener
# Server requirements
  - PHP >= 7.1.3
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Mbstring PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension
  - Ctype PHP Extension
  - JSON PHP Extension
  - BCMath PHP Extension
  - Composer https://getcomposer.org/
  - MySQL >= 5.0

# Quick Installation

  - Create database "db_name" (use your favorite name for your database)
  - run command
    ```sh
    $ git clone https://github.com/aryoprakarsa/linktracking.git urlshort
    $ cd urlshort
    ```
  - Edit file **.env** in  folder **allscript** at DB section like this example and replace db_name, db_username, & db_password with your own
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_name
    DB_USERNAME=db_username
    DB_PASSWORD=db_password
    ```
  - run command
    ```sh
    $ cd allscript
    $ composer update
    $ php artisan migrate
    $ php artisan db:seed
    $ php artisan passport:install
    $ php artisan serve
    ```
  - For user login use default credential
    > email     : admin@example.com
    > password  : password

# API Access
Based api url is ```yourdomain.com/api/....```
In this case, for shortening url, use POST type request to ```yourdomain.com/api/short/url```
For example code using [Postman](https://www.getpostman.com/)  and our domain https://aryolab.xyz/ with data key ```link``` and value ```https://laravel.com/```
  - HTTP
    ```sh
    POST /api/short/url? HTTP/1.1
    Host: aryolab.xyz
    Content-Type: application/x-www-form-urlencoded
    cache-control: no-cache
    Postman-Token: bf0be3b3-3d18-4ae3-afc5-164bc0b579cd
    link=https%3A%2F%2Flaravel.com%2Fundefined=undefined
    ```
  - cURL
    ```sh
    curl -X POST \
    https://aryolab.xyz/api/short/url \
    -H 'Content-Type: application/x-www-form-urlencoded' \
    -H 'Postman-Token: cdcf65c2-680a-4565-94ce-ea50d172c016' \
    -H 'cache-control: no-cache' \
    -d 'link=https%3A%2F%2Flaravel.com%2F&undefined='
    ```
