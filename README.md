# SimpleRouter
Simple object oriented Router for php 
- Support `GET`, `POST` methods


## Usage
basic index.php file
```php
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new mOsz\Router\Router($_SERVER['REQUEST_URI']);

// Add routes
$router->get('path', function(){ ... });

$router->run(); 
```
Routes utilisation :
- Basic use
```php
$router->get('HelloWorld', function(){ echo "Hello World"; });
```
#### MVC
- GET method
```php
$router->get('Homepage', function(){ $controller = new Test\Controller; $controller->index(); });
```

- GET method with params
```php
$router->get('posts/{id}', function($id) { $controller = new Test\Controller; $controller->posts($id); });
```

- POST method  
```php
$router->get('form', function() { $controller = new Test\Controller; $controller->form(); });
```
Form traitement example
```php
$router->post('form', function() { $controller = new Test\Controller; $controller->form(); });
```





