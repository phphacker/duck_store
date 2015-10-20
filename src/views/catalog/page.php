<section>
<div class="container">
	<div class="row clearfix">
    <!-- боковое меню -->
    <?php include_once __DIR__ . '/../category_menu.php'; ?>
		<div class="column column9">
			<div class="catalog">
				<!-- хлебные крошки -->
				<div class="breadcrumbs">
					<a href="index.html">Магазин</a>
					<p>Мини - утки</p>
				</div>
				<div class="row clearfix">
					<!-- элементы каталога -->
          <?php
            foreach($products as $product) {
              include __DIR__ . '/../_product.php';
            }
          ?>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
