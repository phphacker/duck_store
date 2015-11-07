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
      $stmt = $this->connection->prepare("SELECT * FROM `products` LIMIT 6");
      $stmt->execute();

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  function getProduct($id)
  {
    if (isset($connection))
    {
    $sql = 'SELECT * FROM `products` as p where p.id=:id';
    $stmt = $connection->executeQuery($sql, ['id' => $id]);

    $product = $stmt->fetch();
    }
  }

}
