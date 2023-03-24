<div class="projects__houses">
	<div class="projects__aside projects__aside--second">
		<h3 class="projects__asideTitle">Проекты нежелых помещений</h3>
		<div class="projects__asideContent">
			<ul>
				<li>Бани</li>
				<li>Бытовки</li>
				<li>Хоз. блоки</li>
				<li>Гаражи</li>
				<li>Навесы</li>
			</ul>
		</div>
	</div>
	<div class="projects__list">
		<?php foreach(getCatalog(3, 'non-residential') as $project) { ?>
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
		<a href="/purpose/non-residential/" class="project project--more">
			<span class="project__more">Смотреть все проекты нежелых помещений</span>
		</a>
	</div>
</div>