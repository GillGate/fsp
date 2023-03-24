<?php get_header(); ?>
	<div class="breadcrumbs">
		<div class="container breadcrumbs__wrapper">
			<a href="/">Главная</a>
			<a><?php the_title(); ?></a>
		</div>
	</div>
	<section class="page">
		<div class="container">
			<h1 class="title page__title"><?php the_title(); ?></h1>
			<div class="page__content"><?php wpautop(the_content()); ?></div>
		</div>
	</section>
	<?php get_template_part('include/technology'); ?>
	<?php get_template_part('include/advantages'); ?>
	<?php get_template_part('include/orderProcess'); ?>
	<div class="backTop">
		<a href="#header" class="button navLink backTop__button">Перейти в начало сайта</a>
	</div>
<?php get_footer(); ?>