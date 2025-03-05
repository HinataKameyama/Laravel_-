<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/HelloWorld', function(){
    return view('HelloWorld');
});

?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>Hello</title>
</head>
<body>
    <div>Hello World!</div>
</body>
</html>