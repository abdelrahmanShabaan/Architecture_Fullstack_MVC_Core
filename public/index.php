<?php

use Mono\Http\Request;
use Mono\Http\Response;
use Mono\Http\Route;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/web.php';



$route = new Route(new Request, new Response);

dump($route->request->path());

