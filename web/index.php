<?php

use App\DB;

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';
//include_once __DIR__ . '/../src/autoload.php' ;

require_once __DIR__.'/../src/App/DB/ProductRepository.php';
require_once __DIR__.'/../src/App/DB/CategoryRepository.php';


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


$productRepository = new DB\ProductRepository($app['db']);
$categoryRepository = new DB\CategoryRepository($app['db']);

$app->get('/', function () use ($app, $productRepository, $categoryRepository) {

  $products = $productRepository->getProducts();
  $categories = $categoryRepository->getCategories();
  return $app['twig']->render('main_page.twig', ['products' => $products, 'categories' => $categories]);
});

$app->get('/product/{id}', function ($id) use ($app, $productRepository) {

  $product = $productRepository->getProduct($id);
  return $app['twig']->render('product.twig', ['product' => $product]);

})->bind('show_product');


$app->get('/catalog/{id}', function ($id) use ($app, $productRepository) {

  $products = $productRepository->getProductsInCategory();
  return $app['twig']->render('catalog.twig', ['category_products' => $category_products]);
})->bind('show_catalog');

$app->run();
