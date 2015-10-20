<?php

include_once __DIR__ . '/../src/autoload.php' ;

use App\DB;
use App\Controller;

$connection = new DB\Connection();
$productRepository = new DB\ProductRepository($connection);

$page = 'main';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

switch ($page) {
	case 'main':
		$page = new Main($productRepository);
		$page->page();
		break;
	case 'catalog':
		$page = new Catalog($productRepository);
		$page->page();
		break;
	case 'product':
		include_once __DIR__ . '/../src/product.php';
		break;
	default:
		die('404');
		break;
}
