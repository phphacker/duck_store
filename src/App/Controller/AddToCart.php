<?php

namespace App\Controller;

use App\DB\ProductRepository;

class AddToCart
{
  public function __construct(ProductRepository $productRepository)
  {
    $this->productRepository = $productRepository;
  }

  public function page($id)
  {
    if ($_SESSION['user']) {
      $product = $this->productRepository->getProduct($id);

      $inCart = $_COOKIE['products'][$id];
      if ($inCart) {
        $inCart++;
      } else {
        $inCart = 1;
      }

      setcookie('products['.$id.']', $inCart, time() + (3600 * 24 * 7));
      header('Location: http://localhost/duck_store929/web/index.php');
    } else {
      header('Location: http://localhost/duck_store929/web/index.php?page=login');
    }
  }
}
