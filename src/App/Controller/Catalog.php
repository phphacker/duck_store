<?php

namespace App\Controller;

use App\DB\CatalogRepository;

class Catalog
{
  public function __construct(CatalogRepository $categoryRepository)
  {
    $this->categoryRepository = $categoryRepository;
  }

  public function page($categoryId)
  {
    $products = $this->categoryRepository
      ->getProductsForCategory($categoryId);

    $this->render($products);
  }

  protected function render($products)
  {
    include_once __DIR__ . '/../../views/head.php';
    include_once __DIR__ . '/../../views/header.php';
    include_once __DIR__ . '/../../views/catalog/page.php';
    include_once __DIR__ . '/../../views/footer.php';
  }
}
