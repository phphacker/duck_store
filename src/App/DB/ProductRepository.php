<?php

namespace App\DB;

class ProductRepository
{
  private $connection;

  public function __construct($conn)
  {
    $this->connection = $conn;
  }

  public function getProducts()
  {
    $sql = "SELECT * FROM `products` LIMIT 6";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();

    return $products;
  }

  function getProduct($id)
  {
    $sql = 'SELECT * FROM `products` as p where p.id=:id';
    $stmt = $this->connection->executeQuery($sql, ['id' => $id]);
    $product = $stmt->fetch();

    return $product;
  }
}
