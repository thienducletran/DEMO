<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

echo "products.destroy => " . route('products.destroy', 1) . "\n";
echo "products.store => " . route('products.store') . "\n";
echo "products.update => " . route('products.update', 1) . "\n";
