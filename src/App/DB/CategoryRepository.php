<?php

namespace App\DB;

class CategoryRepository
{
  private $connection;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection;
  }

  public function getCategories()
  {
    $stmt = $this->connection->prepare("SELECT * FROM `categories`");
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  function getProduct($db, $id)
  {
      $stmt = $db->prepare(
          "SELECT p.id, p.title, p.description, p.price, c.title AS c_title
              FROM `products` AS p
              INNER JOIN `categories` AS c
                  ON p.`category_id` = c.`id`
              WHERE p.`id` = :id"
      );
      $stmt->bindParam(":id", $id);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
