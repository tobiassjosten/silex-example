<?php

/**
 * BOOTSTRAP
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$app = require __DIR__.'/bootstrap.php';


/**
 * APP DEFINITION
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$blog_posts = array(
    1 => array(
        'date'   => '2011-03-29',
        'author' => 'igorw',
        'title'  => 'Using Silex',
        'body'   => '...',
    ),
    2 => array(
        'date'   => '2011-05-27',
        'author' => 'tobiassjosten',
        'title'  => 'Silex on Pagoda',
        'body'   => '...',
    ),
);

/**
 * Blog index page.
 */
$app->get('/', function () use ($app, $blog_posts) {
    foreach ($blog_posts as $id => $post) {
        $blog_posts[$id]['url'] = $app['url_generator']->generate('blog_show', array('id' => $id));
    }

    return $app['twig']->render('blog_index.twig', array(
        'posts' => $blog_posts,
    ));
})
->bind('blog_index');

/**
 * Blog post landing page.
 */
$app->get('/{id}', function ($id) use ($app, $blog_posts) {
    return $app['twig']->render('blog_show.twig', array(
        'post' => $blog_posts[$id],
    ));
})
->assert('id', '[0-9]+')
->convert('id', function ($id) { return (int) $id; })
->bind('blog_show');

return $app;
