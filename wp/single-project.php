<?php get_header(); ?>
<?php
	$post_id = get_the_ID();
	$current_post = get_fields();
	$purpose = wp_get_object_terms($post_id, 'purpose')[0];
	$style = wp_get_object_terms($post_id, 'style')[0];
?>
	<div class="breadcrumbs">
		<div class="container breadcrumbs__wrapper">
			<a href="/">Главная</a>
			<a href="/project/">Каталог проектов</a>
			<a><?php the_title(); ?></a>
		</div>
	</div>
	<section class="singleProject">
		<div class="container">
			<h1 class="title singleProject__title"><?php the_title(); ?></h1>
			<div class="singleProject__main">
				<?php  $images = acf_photo_gallery('project-gallery', $post_id); ?>
				<div class="singleProject__slider">
					<div class="singleProject__sliderMain">
						<?php  if( count($images) ) { 
							foreach($images as $image) { ?>
								<div>
									<img src="<?php echo $image['full_image_url']; ?>" alt="">
								</div>
						<?php } } else { ?>
							<div>
								<?php the_post_thumbnail(); ?>
							</div>
						<?php } ?>
					</div>
					<div class="singleProject__sliderNav">
						<?php  if( count($images) ) { 
							foreach($images as $image) { ?>
								<div>
									<img src="<?php echo $image['full_image_url']; ?>" alt="">
								</div>
						<?php } } ?>
					</div>
				</div>
				<h2 class="vh">Подробнее</h2>
				<div class="singleProject__content">
					<div class="singleProject__section singleProject__section--props">
						<h3 class="singleProject__sectionTitle">Характеристики:</h3>
						<ul class="singleProject__props">
							<li class="singleProject__prop">
								Стиль:
								<strong>
									<?php echo the_terms( $post_id, 'style' ); ?>
								</strong>
							</li>
							<li class="singleProject__prop">
								Размеры:
								<strong><?php echo $current_post["project-props"]["size"]?> м</strong>
							</li>
							<li class="singleProject__prop">
								Жилая площадь:
								<strong><?php echo $current_post["project-props"]["square"]?> м²</strong>
							</li>
							<li class="singleProject__prop">
								Высота в коньке:
								<strong><?php echo $current_post["project-props"]["height"]?> м</strong>
							</li>
							<li class="singleProject__prop">
								Этажи:
								<strong><?php echo $current_post["project-props"]["floors"]?></strong>
								<?php if($current_post["project-props"]["square-floors"] !== '') { ?>
									(<?php echo $current_post["project-props"]["square-floors"]?> м²)
								<?php } ?>
							</li>
							<li class="singleProject__prop singleProject__prop--sep">
								Сборка каркаса:
								<strong><?php echo $current_post["project-props"]["assembling"]?></strong>
							</li>
							<li class="singleProject__prop">
								Под ключ:
								<strong><?php echo $current_post["project-props"]["turnkey"]?></strong>
							</li>
						</ul>
					</div>
					<div class="singleProject__section singleProject__section--order">
						<h3 class="singleProject__sectionTitle singleProject__sectionTitle--black">Домокомплект:</h3>
						<p class="singleProject__price"><?php echo $current_post["project-price"]["main"]?> ₽</p>
						<ul class="singleProject__priceVars">
							<?php if($current_post["project-price"]["foundation-and-assebly"] !== '') { ?>
								<li class="singleProject__priceVar">
									С фундаментом и сборкой:
									<strong><?php echo $current_post["project-price"]["foundation-and-assebly"]?> ₽</strong>
								</li>
							<?php } ?>
							<?php if($current_post["project-price"]["finishing-and-insulation"] !== '') { ?>
								<li class="singleProject__priceVar">
									+ отделка и утепление:
									<strong><?php echo $current_post["project-price"]["finishing-and-insulation"]?> ₽</strong>
								</li>
							<?php } ?>
							<?php if($current_post["project-price"]["turnkey"] !== '') { ?>
								<li class="singleProject__priceVar singleProject__priceVar--red">
									Под ключ:
									<strong><?php echo $current_post["project-price"]["turnkey"]?> ₽</strong>
								</li>
							<?php } ?>
						</ul>
						<button class="button singleProject__order" data-fancybox data-src="#order-call">Заказать проект</button>
					</div>
					<div class="singleProject__section singleProject__section--desc">
						<h3 class="singleProject__sectionTitle">Описание:</h3>
						<div class="singleProject__desc">
							<?php wpautop(the_content()); ?>
						</div>
						<button class="singleProject__descMore">Полное описание</button>
					</div>
					<div class="singleProject__section singleProject__section--options">
						<div class="singleProject__options">
							<a href="#" class="singleProject__option">Беспроцентная рассрочка до 1 года!</a>
							<a href="#" class="singleProject__option singleProject__option--second">В кредит - от 5.5% </a>
							<a href="#" class="singleProject__option singleProject__option--third">Скидка 10% при заказе от 2х</a>
						</div>
					</div>
				</div>
			</div>
			<div class="singleProject__additional">
				<div class="singleProject__section singleProject__section--decor">
					<h3 class="singleProject__sectionTitle singleProject__sectionTitle--black">Варианты внешней отделки (любой цвет):</h3>
					<div class="singleProject__decor">
						<input type="radio" name="decor-ext" id="decor-ext-1" class="vh" value="Профлист" checked>
						<label for="decor-ext-1" class="singleProject__decorOption">
							<div class="singleProject__decorImg">
								<img src="<?php echo IMG_DIR ;?>/dec-ext-1.jpg" draggable="false" alt="Образец профлиста">
							</div>
							<p class="singleProject__decorTitle">Профлист</p>
						</label>
						<input type="radio" name="decor-ext" id="decor-ext-2" value="Кликфальц" class="vh">
						<label for="decor-ext-2" class="singleProject__decorOption">
							<div class="singleProject__decorImg">
								<img src="<?php echo IMG_DIR ;?>/dec-ext-2.jpg" draggable="false" alt="Образец кликфальца">
							</div>
							<p class="singleProject__decorTitle">Кликфальц</p>
						</label>
						<input type="radio" name="decor-ext" id="decor-ext-3" value="Имитация бруса" class="vh">
						<label for="decor-ext-3" class="singleProject__decorOption">
							<div class="singleProject__decorImg">
								<img src="<?php echo IMG_DIR ;?>/dec-ext-3.jpg" draggable="false" alt="Образец имитации бруса">
							</div>
							<p class="singleProject__decorTitle">Имитация бруса</p>
						</label>
					</div>
					<h3 class="singleProject__sectionTitle singleProject__sectionTitle--black">Варианты внутренней отделки (любой цвет):</h3>
					<div class="singleProject__decor">
						<input type="radio" name="decor-in" id="decor-in-1" class="vh" value="Плитка" checked>
						<label for="decor-in-1" class="singleProject__decorOption">
							<div class="singleProject__decorImg">
								<img src="<?php echo IMG_DIR ;?>/dec-in-1.jpg" draggable="false" alt="Образец профлиста">
							</div>
							<p class="singleProject__decorTitle">Плитка</p>
						</label>
						<input type="radio" name="decor-in" id="decor-in-2" value="Имитация бруса" class="vh">
						<label for="decor-in-2" class="singleProject__decorOption">
							<div class="singleProject__decorImg">
								<img src="<?php echo IMG_DIR ;?>/dec-in-2.jpg" draggable="false" alt="Образец кликфальца">
							</div>
							<p class="singleProject__decorTitle">Имитация бруса</p>
						</label>
						<input type="radio" name="decor-in" id="decor-in-3" value="Вагонка" class="vh">
						<label for="decor-in-3" class="singleProject__decorOption">
							<div class="singleProject__decorImg">
								<img src="<?php echo IMG_DIR ;?>/dec-in-3.jpg" draggable="false" alt="Образец имитации бруса">
							</div>
							<p class="singleProject__decorTitle">Вагонка</p>
						</label>
					</div>
				</div>
				<div class="singleProject__section singleProject__section--panel">
					<h3 class="singleProject__sectionTitle">Используемые панели в комлетакции “Под ключ”:</h3>
					<div class="singleProject__panel">
						<div class="singleProject__panelThick">
							<p class="singleProject__panelCaption">
								<span class="singleProject__panelType singleProject__panelType--big">FSP M</span>
								Толщина панелей <strong>150 мм</strong>
							</p>
							<p class="singleProject__panelText">Без теплоизоляции; является универсальным решением и подходит для строений сезонного проживания, а также бань, дачных домов, складов/ангаров и других строений.</p>
						</div>
						<div class="singleProject__panelThick">
							<p class="singleProject__panelCaption">
								<span class="singleProject__panelType singleProject__panelType--big">FSP M+</span>
								Толщина панелей <strong>150 мм</strong>
							</p>
							<p class="singleProject__panelText">С теплоизоляцией 150 мм на основе базальта; является универсальным решением и подходит для строений сезонного и постоянного проживания, а также бань, дачных домов, складов/ангаров и других строений.
</p>
						</div>
						<div class="singleProject__panelThick">
							<p class="singleProject__panelCaption">
								<span class="singleProject__panelType singleProject__panelType--big">FSP X</span>
								Толщина панелей <strong>200 мм</strong>
							</p>
							<p class="singleProject__panelText">Без теплоизоляции; является универсальным решением и подходит для строений сезонного проживания, а также бань, дачных домов, складов/ангаров и других строений.</p>
						</div>
						<div class="singleProject__panelThick">
							<p class="singleProject__panelCaption">
								<span class="singleProject__panelType singleProject__panelType--big">FSP X+</span>
								Толщина панелей <strong>200 мм</strong>
							</p>
							<p class="singleProject__panelText">С теплоизоляцией 200 мм на основе базальта; является самой тёплой и подходит для коттеджей/домов предназначенныx для постоянного проживания, а также бань, дачных домов, складов/ангаров и других строений.</p>
						</div>
					</div>
					<h3 class="singleProject__sectionTitle singleProject__sectionTitle--black">Возможно использование серии панелей:</h3>
					<div class="singleProject__panels">
						<div>
							<button class="singleProject__panelType">FSP M</button>
						</div>
						<div>
							<button class="singleProject__panelType">FSP M+</button>
						</div>
						<div>
							<button class="singleProject__panelType">FSP X</button>
						</div>
						<div>
							<button class="singleProject__panelType">FSP X+</button>
						</div>
					</div>
				</div>
				<div class="singleProject__section singleProject__section--suitable">
					<h3 class="singleProject__sectionTitle">Подходит для:</h3>
					<ul class="singleProject__suitable">
						<li>Постоянное проживание</li>
						<li>Бизнес под аренду</li>
						<li>Массовая застройка</li>
						<li>Гэмплинг</li>
						<li>Дачный дом</li>
						<li>Гостевой дом</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="complite">
		<div class="container">
			<h2 class="title complite__title">Комплектация “Под ключ”:</h2>
			<ul class="complite__list">
				<li>
					<ul class="complite__item">
						<li>Фермы A-Frame с лагами пола</li>
						<li>Комплект стен фронтонов</li>
						<li>Комплект крепежей</li>
						<li>Отделка внутри - дерево (дерево)</li>
						<li>Панорамные окна ПВХ</li>
					</ul>
				</li>
				<li>
					<ul class="complite__item">
						<li>Отделка снаружи (профнастил/фальцевая кровля)</li>
						<li>Антресоль (по желанию)</li>
						<li>Терраса</li>
						<li>Электрика</li>
						<li>Устройство горячего и холодного водоснабжения</li>
					</ul>
				</li>
				<li>
					<ul class="complite__item">
						<li>Обустройство бойлерной</li>
						<li>Септик</li>
						<li>Вентиляция</li>
						<li>Конвекторное отопление</li>
						<li>Лестница</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>
	<?php get_template_part('include/technology'); ?>
	<?php get_template_part('include/orderProcess'); ?>
	<?php get_template_part('include/other'); ?>
	<section class="singleOther projects">
		<div class="container">
			<div class="projects__houses">
				<div class="projects__aside">
					<div class="projects__offer">
						<h4 class="projects__offerTitle">Индивидуальное проектирование</h4>
						<p class="projects__offerCaption">Мы готовы разработать индивидуальный проект по вашему заказу!</p>
						<button class="button projects__offerBtn" data-fancybox data-src="#order-call">Получить предложение</button>
					</div>
				</div>
				<div class="projects__list">
					<?php foreach(getCatalog(4, $purpose->slug, $style->slug) as $project) { ?>
					<a href="<?php echo $project['project-link']; ?>" class="project">
						<div class="project__head">
							<div class="project__img">
								<?php echo $project['project-img']; ?>
							</div>
							<div class="project__props">
								<span class="project__prop"><?php echo $project['project-props']['size']; ?> м</span>
								<span class="project__prop project__prop--square"><?php echo $project['project-props']['square']; ?> м²</span>
							</div>
						</div>
						<div class="project__info">
							<h3 class="project__title"><?php echo $project['project-title']; ?></h3>
							<p class="project__price">от <?php echo $project['project-price']['main']; ?> ₽</p>
						</div>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<div class="backTop">
		<a href="#" class="button navLink backTop__button">Вернуться в каталог</a>
	</div>
<?php get_footer(); ?>