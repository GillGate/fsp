<?php get_header(); ?>
<?php
	$post_id = get_the_ID();
	$current_post = get_fields();
?>
<!-- 	<section class="post">
		<div class="container">
			<div class="post__wrapper">
				<div class="post__head">
					<h1 class="post__title"><?php the_title(); ?></h1>
					<p class="post__date"><?php the_date(); ?></p>
				</div>
				<div class="text post__content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section> -->
<?php get_footer(); ?>