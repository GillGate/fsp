<section class="reviews">
	<div class="container reviews__wrapper">
		<h2 class="title reviews__title">Отзывы клиентов</h2>
		<div class="reviews__list">
			<?php foreach(getReviews() as $review) { ?>
			<div>
				<div class="reviews__item review">
					<div class="review__head">
						<div class="review__img">
							<img src="<?php echo IMG_DIR ;?>/review-img.png" alt="">
						</div>
						<h3 class="review__name"><?php echo $review['review-title']; ?></h3>
						<div 
							class="review__score" 
							style="width: calc(27px * <?php echo $review['review-score']; ?>);">
						</div>
					</div>
					<div class="review__body">
						<?php echo wpautop($review['review-content']); ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="reviews__dots"></div>
	</div>
</section>