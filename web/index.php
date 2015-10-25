<?php

include_once __DIR__ . '/../src/autoload.php' ;

use App\DB;

session_start();

$connection = new DB\Connection();
$productRepository = new DB\ProductRepository($connection);
$catalogRepository = new DB\CatalogRepository($connection);
$userRepository = new DB\UserRepository($connection);

$page = 'main';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

switch ($page) {
	case 'main':
		$page = new \App\Controller\Main($productRepository);
		$page->page();
		break;
	case 'add_to_cart':
		$page = new \App\Controller\AddToCart($productRepository);
		$page->page($_GET['id']);
		break;
	case 'catalog':
		$page = new \App\Controller\Catalog($catalogRepository);
		$page->page($_GET['id']);
		break;
	case 'login':
		$page = new \App\Controller\Login($userRepository);
		$page->page();
		break;
	case 'register':
		$page = new \App\Controller\Register($userRepository);
		$page->page();
		break;
	case 'product':
		include_once __DIR__ . '/../src/product.php';
		break;
	default:
		die('404');
		break;
}
