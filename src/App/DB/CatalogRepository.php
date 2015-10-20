<?php

namespace App\DB;

class CatalogRepository
{
  private $connection;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection->getConnection();
  }

  public function getProductsForCategory($categoryId)
  {
    $sql = "SELECT * FROM `products` WHERE `category_id` = :id";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':id', $categoryId);
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
}
