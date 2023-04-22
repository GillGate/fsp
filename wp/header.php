<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
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
					<div class="nav__link nav__link--nested">
						<a href="/project/">Каталог проектов</a>
						<?php $purposes = get_terms(['taxonomy' => 'purpose']); ?>
						<div class="nav__linkNested">
							<?php foreach($purposes as $purpose) { ?>
								<a href="/purpose/<?php echo $purpose->slug ?>" class="nav__link"><?php echo $purpose->name ?></a>
							<?php } ?>
						</div>
					</div>
					<a href="/services/" class="nav__link">Услуги</a>
					<a href="/contacts/" class="nav__link">Контакты</a>
				</nav>
			</div>	
			<div class="header__contact">
				<a href="tel:+79808006012" class="header__contactPhone">+7 (980) 800-60-12</a>
				<button class="button header__contactOrder" data-fancybox data-src="#order-call">Заказать звонок</button>
			</div>
			<div class="header__order form" id="order-call">
				<h3 class="title form__title">Оформите заявку прямо сейчас!</h3>
				<?php get_template_part('include/form') ?>
			</div>
		</div>
	</header>