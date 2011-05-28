<?php

require_once __DIR__.'/../vendor/silex/silex.phar';

$app = new Silex\Application();

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->register(new Silex\Extension\TwigExtension(), array(
    'twig.path'       => __DIR__.'/../views',
    'twig.class_path' => __DIR__.'/../vendor/twig/lib',
));

$app->register(new Silex\Extension\UrlGeneratorExtension());

$app->error(function (\Exception $e) use ($app) {
    if ($e instanceof NotFoundHttpException) {
        return $app['twig']->render('error.twig', array(
            'code' => 404,
            'message' => 'The requested page could not be found.',
        ));
    }

    $code = ($e instanceof HttpException) ? $e->getStatusCode() : 500;
    return $app['twig']->render('error.twig', array(
        'code' => $code,
        'message' => $e,
    ));
});

return $app;
