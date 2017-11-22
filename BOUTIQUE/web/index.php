<?php

require_once __DIR__ . '/../vendor/autoload.php';// toujours des espaces entre __DIR__ et .

$app = new Silex\Application ;// antislash = namespace

// $app ->get('/', function(){//   (/ = URL ou la route)
//     return 'hello World!';
// });
//
// $app -> get('/hello/{name}', function($name) use($app) {
//     return 'Hello' . $app-> escape($name);

//});

//$app['debug'] = true;
require __DIR__ . '/../app/config/dev.php';
require __DIR__ . '/../app/app.php';
require __DIR__ . '/../app/routes.php';







$app -> run();


 ?>
