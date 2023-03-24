<?php get_header(); ?>
	<div class="breadcrumbs">
		<div class="container breadcrumbs__wrapper">
			<a href="/">Главная</a>
			<a><?php the_title(); ?></a>
		</div>
	</div>
	
	<section class="about about--single">
		<div class="container">
			<h1 class="title"><?php the_title(); ?></h1>
			<h2 class="title about__title about__title--red">Группа компаний «Реконстрой»</h2>
			<div class="about__wrapper">
				<div class="about__left">
					<div class="about__logo">
						<img src="<?php echo IMG_DIR ;?>/logo-white.png" alt="">
					</div>
				</div>
				<div class="about__info">
					<div class="about__text">
						<?php wpautop(the_content()); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="backTop">
		<a href="#header" class="button navLink backTop__button">Перейти в начало сайта</a>
	</div>
<?php get_footer(); ?>