<?php

include_once __DIR__ . '/../src/autoload.php'



include_once 'views/head.php';
include_once 'views/header.php';
?>
<main>
	<div class="container">
		<div class="banner"></div>
		<div class="row clearfix">
		<?php include_once 'views/category_menu.php'; ?>
			<div class="column column9">
				<div class="catalog">
					<div class="row clearfix">
					<!-- элементы каталога -->
						<?php
						for ($i=0; $i < 6; $i++) {
							include 'views/_product.php';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include_once 'views/footer.php'; ?>
