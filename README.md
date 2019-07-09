c:/tools/php/php.ini ... uncoment "extension=pdo_mysql" line



Criar projeto

https://lumen.laravel.com/docs/5.8/installation

Sobre RedBean

https://redbeanphp.com/manual3_0/index.php?p=/manual3_0/quick_tour

Install RedBean on lumen project

https://github.com/gabordemooij/redbean
> composer update





Tutorial

https://auth0.com/blog/developing-restful-apis-with-lumen/


Create service paackage and instance R::setup

R::setup('mysql:host=localhost;port=3306;dbname=homestead','root','');

Transactions: https://redbeanphp.com/manual3_0/index.php?p=/manual3_0/transactions





Migrations

https://laravel.com/docs/5.8/migrations

criei .env e rodei:
> php artisan make:migration create-tools-table
edit "database/migrations/2019_07_09_002914_create-tools-table.php"
> php artisan migrate --force





Testing

php .\vendor\phpunit\phpunit\phpunit
