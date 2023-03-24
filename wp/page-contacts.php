<?php get_header(); ?>
	<div class="breadcrumbs">
		<div class="container breadcrumbs__wrapper">
			<a href="/">Главная</a>
			<a><?php the_title(); ?></a>
		</div>
	</div>
	<section class="contacts">
		<div class="container">
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="contacts__wrapper">
				<div class="contacts__info">
					<h2 class="title contacts__title">Группа компаний «Реконстрой»</h2>
					<ul class="contacts__list">
						<li>
							<strong class="contacts__caption">Наш офис:</strong>
							<address>
								143200, Московская область, г. Можайск, <br>
								ул. Бородинская, дом 37А, офис 1
							</address>
						</li>
						<li>
							<strong class="contacts__caption">Режим работы:</strong>
							<span>с 9:00 до 21:00</span>, без выходных
						</li>
						<li>
							<strong class="contacts__caption">Телефон:</strong>
							<a href="tel:+89808006012">8 (980) 800-60-12</a>
						</li>
						<li>
							<strong class="contacts__caption">E-mail:</strong>
							<a href="mailto:info@rekonstroy-m.ru">info@rekonstroy-m.ru</a>
						</li>
					</ul>
					<div class="contacts__requisites">
						<p class="contacts__caption">Ревизиты компании:</p>
						<p class="contacts__requisitesBody">
							ООО "РЕКОНСТРОЙ", <br>
							ИНН: 5028037754, ОГРН: 1225000074804, <br>
							Р/С: 40702810610001121332
						</p>	
					</div>
				</div>
				<div class="contacts__map">
				<div style="position:relative;overflow:hidden;">
					<iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=35.991118%2C55.508269&mode=search&oid=57660542685&ol=biz&z=17" width="100%" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part('include/about'); ?>
	<div class="backTop">
		<a href="#header" class="button navLink backTop__button">Перейти в начало сайта</a>
	</div>
<?php get_footer(); ?>