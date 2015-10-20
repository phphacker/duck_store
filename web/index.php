<?php

include_once __DIR__ . '/../src/autoload.php' ;

use App\DB;

$connection = new DB\Connection();
$productRepository = new DB\ProductRepository($connection);
$catalogRepository = new DB\CatalogRepository($connection);

$page = 'main';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

switch ($page) {
	case 'main':
		$page = new \App\Controller\Main($productRepository);
		$page->page();
		break;
	case 'catalog':
		$page = new \App\Controller\Catalog($catalogRepository);
		$page->page($_GET['id']);
		break;
	case 'product':
		include_once __DIR__ . '/../src/product.php';
		break;
	default:
		die('404');
		break;
}
