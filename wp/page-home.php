<?php get_header(); ?>
	<section class="intro">
		<div class="container">
			<div class="intro__header">
				<div class="intro__headerLogo">
					<img src="<?php echo IMG_DIR ;?>/logo.png" width="126" alt="Логотип FSP">
				</div>
				<div class="intro__headerName">
					<h1 class="title title--red intro__title">Строительство домов по технологии FSP</h1>
					<p class="titleCaption intro__caption intro__caption--desktop">FSP - Frame Structural Panel или Каркасная Структурная Панель</p>
				</div>
			</div>
			<p class="titleCaption intro__caption intro__caption--mobile">FSP - Frame Structural Panel или Каркасная Структурная Панель</p>
			<h2 class="vh">Примеры домов</h2>
			<div class="intro__slider">
				<div class="intro__sliderItem intro__sliderItem--eco"> 
					<div class="intro__sliderImg">
						<img src="<?php echo IMG_DIR ;?>/intro-img.jpg" alt="">
					</div>
					<div class="intro__sliderInfo">
						<span class="intro__sliderGost">ГОСТ <strong>27751-2014</strong></span>
						<h3 class="title intro__sliderTitle">Эко-дом из FSP-панелей “Barn House 3.5х6”</h3>
						<ul class="intro__sliderList">
							<li>Применение современных технологий</li>
							<li>Простота и надежность конструкции</li>
							<li>Срок службы более 30 лет</li>
						</ul>
						<p class="intro__sliderPrice">от <span>480 000 ₽</span></p>
						<div class="intro__offer">
							<div class="intro__offerImg">
								<img src="<?php echo IMG_DIR ;?>/window.png" alt="">
							</div>
							<p class="intro__offerText">
								<strong>Окна в подарок</strong> при заказе “под ключ”
							</p>
						</div>
						<a href="/project/barn-house-3-5h6-s-mansardoj/" class="button intro__sliderMore">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="projects popular">
		<div class="container">
			<div class="popular__header">
				<div class="popular__headerImg">
					<img src="<?php echo IMG_DIR ;?>/popular-star.png" alt="">
				</div>
				<div class="popular__headerInfo">
					<h2 class="title popular__title">Популярные проекты</h2>
					<p class="popular__caption">Предлагаем вашему вниманию широкий выбор проектов с применением технологии FSP. Использование технологии позволяет в считанные дни возвести высоко-качественную экологичную конструкцию по всем нормам ГОСТ и СНиП. Дом построенный по технологии FSP прослужит вам более 30 лет, обеспечивая надежную защиту от холода и ветра.</p>
				</div>
			</div>
			<div class="projects__houses">
				<div class="projects__aside">
					<h3 class="projects__asideTitle">Проекты домов</h3>
					<div class="projects__asideContent">
						<span>Мы конструируем дома на любой вкус:</span>
						<ul>
							<li>Летние дома</li>
							<li>Тёплые дома</li>
							<li>Дома с мансандрой</li>
						</ul>
						<span>Высота от <strong>1</strong> до <strong>4</strong> этажей</span>
					</div>
					<div class="projects__offer">
						<h4 class="projects__offerTitle">Индивидуальное проектирование</h4>
						<p class="projects__offerCaption">Мы готовы разработать индивидуальный проект по вашему заказу!</p>
						<button class="button projects__offerBtn" data-fancybox data-src="#order-call">Получить предложение</button>
					</div>
				</div>
				<div class="projects__list">
					<?php foreach(getCatalog() as $project) { ?>
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
					<a href="/purpose/residential/" class="project project--more">
						<div class="project__more">Смотреть все проекты домов</div>
					</a>
				</div>
			</div>
			<?php get_template_part('include/non-residential'); ?>
		</div>
	</section>
	<?php get_template_part('include/technology'); ?>
	<?php get_template_part('include/advantages'); ?>
	<?php get_template_part('include/orderProcessFull'); ?>
	<?php get_template_part('include/reviews'); ?>
	<?php get_template_part('include/discount'); ?>
	<?php get_template_part('include/other'); ?>
	<?php get_template_part('include/about'); ?>
	<div class="backTop">
		<a href="#header" class="button navLink backTop__button">Перейти в начало сайта</a>
	</div>
<?php get_footer(); ?>