<?php

/**
 * BOOTSTRAP
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$blog = require __DIR__.'/blog.php';

$app = require __DIR__.'/bootstrap.php';
$app->mount('/blog', $blog);


/**
 * APP DEFINITION
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.twig');
})
->bind('homepage');

return $app;
