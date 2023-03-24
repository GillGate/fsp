<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body>
	<header id="header" class="header">
		<div class="container header__wrapper">
			<a href="/" class="header__logo">
				<div class="header__logoImg">
					<img src="<?php echo IMG_DIR ;?>/header-logo.png" alt="">
				</div>
				<span class="header__logoText">Строим с 2008</span>
			</a>
			<div class="header__nav">
				<div class="header__bar"><span></span></div>
				<nav class="nav header__navBody">
					<a href="/about/" class="nav__link">О компании</a>
					<a href="/technology/" class="nav__link">О технологии FSP</a>
					<a href="/project/" class="nav__link">Каталог проектов</a>
					<a href="/services/" class="nav__link">Услуги</a>
					<a href="/contacts/" class="nav__link">Контакты</a>
				</nav>
			</div>	
			<div class="header__contact">
				<a href="tel:+79808006012" class="header__contactPhone">+7 (980) 800-60-12</a>
				<button class="button header__contactOrder">Заказать звонок</button>
			</div>
		</div>
	</header>