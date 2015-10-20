<main>
    <div class="container">
        <div class="banner"></div>
        <div class="row clearfix">
            <!-- боковое меню -->
            <?php include_once __DIR__ . '/../category_menu.php'; ?>
            <div class="column column9">
                <div class="catalog">
                    <div class="row clearfix">
                    <!-- элементы каталога -->
                        <?php
                            foreach ($products as $product) {
                                include __DIR__ . '/../_product.php';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
