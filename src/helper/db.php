<?php

$username = 'root';
$password = '';

function get_products($db)
{
    $stmt = $db->prepare("SELECT * FROM `products` LIMIT 6");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_product($db, $id)
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
