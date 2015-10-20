<?php

include_once 'views/head.php';
include_once 'views/header.php';

$product = get_product($db, $_GET['id']);

?>
<section>
<div class="container">
    <div class="row clearfix">
        <!-- боковое меню -->
        <?php include_once 'views/category_menu.php'; ?>
        <div class="catalog column column9">
            <!-- хлебные крошки -->
            <div class="breadcrumbs item-breadcrumbs">
                <a href="index.html">Магазин</a>
                <a href="catalog.html"><?= $product['c_title']; ?></a>
            </div>
            
            <div class=" row clearfix item-heading">
                <!-- название товара -->
                <h1 class="item-name column column6"><?= $product['title']; ?></h1>
                <!-- цена -->
                <p class="price column column6"><?= $product['price']; ?> P</p>
            </div>
            <div class="row clearfix">
                <div class="column column6">
                    <!-- галерея картинок -->
                    <div class="item-gallery">
                        <img src="img/item.jpeg" alt="уточка">
                        <div class="small-images">
                            <img src="img/item.jpeg" alt="уточка">
                            <img src="img/item.jpeg" alt="уточка">
                            <img src="img/item.jpeg" alt="уточка">
                        </div>
                    </div>
                </div>
                <div class="column column6">
                <!-- описание -->
                    <p class="item-description"><?= $product['description'] ?></p>
                    <!-- цена -->
                    <p class="price"><?= $product['price']; ?> P</p>
                    <div class="order-btns">
                        <a href="" class="btn-basket">В Корзину</a>
                        <a href="" class="btn-click">Купить в 1 клик</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php include_once 'views/footer.php';