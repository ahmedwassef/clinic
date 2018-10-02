## Server Requirements


```ruby
PHP >= 7.0.0
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Composer
```
If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command. This command will start a development server at http://localhost:8000:


use your terminal prompt and run :

```shell
php artisan serve

```

Application Key
The next thing you should do after installing Darrbny is set your application key to a random string. 

```shell
php artisan key:generate
```
