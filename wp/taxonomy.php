<?php get_header(); ?>
<?php 
	$cat = get_queried_object();
?>
	<div class="breadcrumbs">
		<div class="container breadcrumbs__wrapper">
			<a href="/">Главная</a>
			<a href="/project/">Проекты домов</a>
			<a>
				<?php echo $cat->name; ?>
			</a>
		</div>
	</div>
	<section class="page catalog">
		<div class="container">
			<h1 class="title page__title">Проекты домов</h1>
			<div class="page__content"><?php echo $cat->description ?></div>
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
		</div>
	</section>
	<div class="backTop">
		<a href="#header" class="button navLink backTop__button">Перейти в начало сайта</a>
	</div>
<?php get_footer(); ?>