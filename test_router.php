<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/admin/products/1', 'POST', ['_method' => 'DELETE']);
$route = app('router')->getRoutes()->match($request);
echo $route->getActionName() . "\n";
