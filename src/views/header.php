<?php

$cartItems = [];
if (isset($_COOKIE['products'])) {
	$cartItems = $_COOKIE['products'];
}

$result = 0;

if (!empty($cartItems)) {
	foreach ($cartItems as $value) {
		$result += $value;
	}
}

$text = sprintf('%d товаров в корзине', $result);

?>
<header>
	<div class="container clearfix">
		<!-- логотип -->
		<a href="#" class="logo">Grand Yellow Duck</a>
		<!-- меню -->
		<nav>
			<ul>
				<li><a href="">О Компании</a></li>
				<li><a href="#">Каталог</a></li>
				<li><a href="">Доставка и оплата</a></li>
				<li><a href="">Контакты</a></li>
			</ul>
		</nav>
		<div style="color: #fff;">
			<?= $text; ?>
		</div>
	</div>
</header>
