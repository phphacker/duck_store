<?php

namespace App\DB;

class ProductRepository
{
  private $connection;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection->getConnection();
  }

  public function getProducts()
  {
      $stmt = $this->connection->prepare("SELECT * FROM `products` LIMIT 6");
      $stmt->execute();

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  function getProduct($categoryId)
  {
      $stmt = $this->connection->prepare(
          "SELECT p.id, p.title, p.description, p.price, c.title AS c_title
              FROM `products` AS p
              INNER JOIN `categories` AS c
                  ON p.`category_id` = c.`id`
              WHERE p.`id` = :id"
      );
      $stmt->bindParam(":id", $categoryId);
      $stmt->execute();

      return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

}
