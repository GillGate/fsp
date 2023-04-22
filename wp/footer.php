	<footer class="footer">
		<div class="container footer__wrapper">
			<div class="footer__body">
				<div class="footer__company">
					<div class="footer__companyLogo">
						<img src="<?php echo IMG_DIR ;?>/logo-white.png" alt="">
					</div>
					<p class="footer__companyText">
						Производство и установка <br>
						домокомплектов <br>
						по FSP - Технологии
					</p>
				</div>
				<div class="footer__nav">
					<a href="/about/" class="footer__navLink">О компании</a>
					<a href="/project/" class="footer__navLink">Каталог проектов</a>
					<a href="/technology/" class="footer__navLink">О технологии FSP</a>
					<a href="/services/" class="footer__navLink">Услуги</a>
					<a href="/contacts/" class="footer__navLink">Контакты</a>
				</div>
				<!-- <div class="footer__social">
					<p class="footer__caption">Наши соц. сети</p>
					<div class="footer__socialList"></div>
				</div> -->
				<div class="footer__contacts">
					<div class="footer__contact">
						<p class="footer__caption">Телефон</p>
						<a href="tel:+79057963117">+7 (980) 800-60-12</a>
						
					</div>
					<div class="footer__contact">
						<p class="footer__caption">Адрес</p>
						<address class="footer__address">
							г. Можайск , ул. Бородинская, <br>
							дом 37А, офис 1
						</address>
					</div>
				</div>
			</div>
			<div class="footer__bottom">
				<span>.</span>
				<p class="footer__bottomText">© Реконстрой Групп - 2023</p>
				<a href="#" class="footer__policy">Политика конфиденциальности</a>
			</div>
		</div>
	</footer>
	<script>
	const themeRoot = "<?php echo THEME_ROOT ?>";
	</script>
	<?php wp_footer(); ?>
</body>
</html>