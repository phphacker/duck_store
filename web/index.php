<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../src/views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'duck_store',
            'user'      => 'root',
            'password'  => '',
            'charset'   => 'utf8'
    ),
));

$app->get('/', function () use ($app) {

    $sql = "SELECT * FROM `products` LIMIT 6";

    $stmt = $app['db']->prepare($sql);
    $stmt->execute();

    $products = $stmt->fetchAll();

    return $app['twig']->render('main_page.twig', ['products' => $products]);
});

$app->get('/product/{id}', function ($id) use ($app) {

$sql = 'SELECT * FROM `products` as p where p.id=:id';
$stmt = $app['db']->executeQuery($sql, ['id' => $id]);

$product = $stmt->fetch();

return $app['twig']->render('product.twig', ['product' => $product]);

})->bind('show_product');


$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});

$app->run();
