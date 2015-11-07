<?php

namespace App\DB;

class CategoryRepository
{
  private $connection;

  public function __construct($conn)
  {
    $this->connection = $conn;
  }

  public function getCategories()
  {
    $sql = "SELECT * FROM `categories` LIMIT 6";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();

    return $categories;
  }

  function getProductsInCategory($category_id)
  {
      $sql = "SELECT p.id, p.title, p.description, p.price, c.title AS c_title
              FROM `products` AS p
              INNER JOIN `categories` AS c
                  ON p.`category_id` = c.`id`
              WHERE c.`id` = :id";

      $stmt = $this->connection->executeQuery($sql, ['id' => $category_id]);
      $products = $stmt->fetch();

      return $products;
  }
}
