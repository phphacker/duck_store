<?php

namespace App\DB;

class CategoryRepository
{
  private $connection;

  public function __construct($conn)
  {
    $this->connection = $conn;
  }

  public function getCategory($id)
  {
    $sql = "SELECT * FROM `categories` WHERE id = :id";
    $stmt = $this->connection->executeQuery($sql, ['id' => $id]);
    $category = $stmt->fetch();

    return $category;
  }

  public function getCategoryForProduct($id)
  {
    $sql = "SELECT c.id, c.title
            FROM `categories` AS c
            INNER JOIN `products` AS p
                ON p.`category_id` = c.`id`
            WHERE p.`id` = :id";

    $stmt = $this->connection->executeQuery($sql, ['id' => $id]);
    $category = $stmt->fetch();

    return $category;
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
      $products = $stmt->fetchAll();

      return $products;
  }
}
