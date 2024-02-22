<?php

namespace Geekbrains\Application1;

require_once 'vendor/autoload.php';

$app=new Application();
echo $app->run ();
//var_dump($_SERVER['REQUEST_URI']);

