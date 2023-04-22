<?php get_header(); ?>
	<div class="breadcrumbs">
		<div class="container breadcrumbs__wrapper">
			<a href="/">Главная</a>
			<a>Проекты домов</a>
		</div>
	</div>

	<section class="page catalog">
		<div class="container">
			<h1 class="title page__title">Проекты домов</h1>
			<div class="page__content"><p><strong>Предлагаем вашему вниманию жилые дома на основе технологии FSP.</strong> FSP (frame structural panel) или же каркасная конструкционная панель - это уникальная разработка нашей компании: модульное строительство лишенное недостатков. Технология позволяющая строить высококачественные конструкции с соблюдением всех норм ГОСТ и СНиП. Дома построенные по FSP технологии - это высочайший стандарт качества, быстрота сборки и более 50 лет службы. Более того, благодаря простоте сборки и качеству обработки материлов, вы можете заказать готовый домокомплект и возвести конструкцию самостоятельно в считанные дни!

 </p></div>
			<div class="catalog__wrapper">
				<?php get_template_part('include/filter'); ?>
				<section class="catalog__main">
					<div class="catalog__list">
						<?php if ( have_posts() ) {
							while ( have_posts() ) {
								the_post(); 
								$project = get_fields(get_the_ID());
							?>
							<a href="<?php the_permalink(); ?>" class="project">
								<div class="project__head">
									<div class="project__img">
										<?php echo get_the_post_thumbnail(); ?>
									</div>
									<div class="project__props">
										<span class="project__prop"><?php echo $project["project-props"]["size"]; ?> м</span>
										<span class="project__prop project__prop--square"><?php echo $project["project-props"]["square"]; ?> м²</span>
									</div>
								</div>
								<div class="project__info">
									<h3 class="project__title"><?php the_title(); ?></h3>
									<p class="project__price">от <?php echo $project["project-price"]["main"]; ?> ₽</p>
								</div>
							</a>
						<?php } } else { ?>
							<div class="catalog__notFound">
								<?php if(isset($_REQUEST['filter-shape'])) { ?>
									По данным параметрам ничего не найдено :(
								<?php } else { ?>
									Товары отсутствуют
								<?php } ?>
							</div>
						<?php } ?>
					</div>
					<div class="catalog__pagination">
						<?php the_posts_pagination(); ?>
					</div>
				</section>
			</div>
			<div class="catalog__nonResidential">
				<?php get_template_part('include/non-residential'); ?>
			</div>
		</div>
	</section>
	<?php get_template_part('include/technology'); ?>
	<?php get_template_part('include/orderProcessFull'); ?>
	<?php get_template_part('include/reviews'); ?>
	<?php get_template_part('include/discount'); ?>
	<?php get_template_part('include/other'); ?>
	<?php get_template_part('include/about'); ?>
	<div class="backTop">
		<a href="#header" class="button navLink backTop__button">Перейти в начало сайта</a>
	</div>
<?php get_footer(); ?>