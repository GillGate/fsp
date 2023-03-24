<aside class="catalog__aside">
	<button class="catalog__toggleFilter">
		<span>Фильтровать по хар-кам</span>
	</button>
	<form method="GET" class="filter">
		<?php 
			$styles = get_terms(['taxonomy' => 'style']);
			$fits = get_terms(['taxonomy' => 'fits']);

			$current_cat = get_queried_object();
		?>
		<h2 class="filter__title">Фильтр</h2>
		<?php if($current_cat->taxonomy !== "style") { ?>
			<label class="filter__label">
				<span class="filter__caption">Форма</span>
				<select class="filter__select" name="filter-shape">
					<option value="any">Любая</option>
					<?php foreach($styles as $style) { ?>
						<option
							value="<?php echo $style->slug; ?>"
							<?php selected(
					        ($_GET['filter-shape'] === $style->slug)
					    ) ?>
						><?php echo "$style->name"; ?></option>
					<?php } ?>
				</select>
			</label>
		<?php } ?>
		<label class="filter__label">
			<span class="filter__caption">Размеры в м²</span>
			<div class="filter__range filter__range--square">
				<div class="filter__rangeSlider"></div>
				<div class="filter__rangeInfo">
					<p class="filter__rangeCaption filter__rangeMin"><span class="filter__caption">от</span> <strong>10</strong> м²</p>
					<p class="filter__rangeCaption filter__rangeMax"><span class="filter__caption">до</span> <strong>200</strong> м²</p>
					<input type="hidden" name="filter-square-min" value="10">
					<input type="hidden" name="filter-square-max" value="200">
				</div>
			</div>
		</label>
		<label class="filter__label">
			<span class="filter__caption">Высота в коньке</span>
			<div class="filter__range filter__range--height">
				<div class="filter__rangeSlider"></div>
				<div class="filter__rangeInfo">
					<p class="filter__rangeCaption filter__rangeMin"><span class="filter__caption">от</span> <strong>0</strong> м</p>
					<p class="filter__rangeCaption filter__rangeMax"><span class="filter__caption">до</span> <strong>8</strong> м</p>
					<input type="hidden" name="filter-height-min" value="0">
					<input type="hidden" name="filter-height-max" value="8">
				</div>
			</div>
		</label>
		<label class="filter__label">
			<span class="filter__caption">Этажность</span>
			<div class="filter__range filter__range--floor">
				<div class="filter__rangeSlider"></div>
				<div class="filter__rangeInfo">
					<p class="filter__rangeCaption filter__rangeMin"><span class="filter__caption">от</span> <strong>1</strong></p>
					<p class="filter__rangeCaption filter__rangeMax"><span class="filter__caption">до</span> <strong>4</strong></p>
					<input type="hidden" name="filter-floor-min" value="1">
					<input type="hidden" name="filter-floor-max" value="4">
				</div>
			</div>
		</label>
		<div class="filter__fits">
			<?php foreach($fits as $item) { ?>
				<label class="filter__fitsItem">
					<input 
						type="checkbox" 
						name="filter[fits][]" 
						class="vh"
						value="<?php echo $item->term_id; ?>"
						<?php checked(
					        (isset($_GET['filter']['fits']) && in_array($item->term_id, $_GET['filter']['fits']))
					    ) ?>
					>
					<span><?php echo "$item->name"; ?></span>
				</label>
			<?php } ?>
		</div>
		<button type="submit" class="button filter__submit">Поиск</button>
	</form>
</aside>
<?php 
	global $wp_query;

	$query = [
		'tax_query' => [
			'relation' => "AND",
		],
		'meta_query' => [
			'relation' => "AND",
		]
	];

	if($current_cat->name === "project") {
		$query['tax_query'][] = [
			'taxonomy' 	=> 'purpose',
			'field'		=> 'slug',
			'terms'		=> 'residential'
		];
	}

	$req_shape = $_REQUEST['filter-shape'];

	if(isset($req_shape) && $req_shape !== "any") {
		$query['tax_query'][] = [
			'taxonomy' 	=> 'style',
			'field'		=> 'slug',
			'terms'		=> $req_shape
		];
	}

	$req_filter_square_min = $_REQUEST['filter-square-min'];
	$req_filter_square_max = $_REQUEST['filter-square-max'];

	if(isset($req_filter_square_min) && $req_filter_square_max) {
		$query["meta_query"][] = [
			'key' => 'project-props_square',
			'value' => [$req_filter_square_min, $req_filter_square_max],
			'type'    => 'numeric',
			'compare' => 'BETWEEN'
		];
	}

	$req_filter_height_min = $_REQUEST['filter-height-min'];
	$req_filter_height_max = $_REQUEST['filter-height-max'];

	if(isset($req_filter_square_min) && $req_filter_square_max) {
		$query["meta_query"][] = [
			'key' => 'project-props_height',
			'value' => [$req_filter_height_min, $req_filter_height_max],
			'type'    => 'numeric',
			'compare' => 'BETWEEN'
		];
	}

	$req_filter_floor_min = $_REQUEST['filter-floor-min'];
	$req_filter_floor_max = $_REQUEST['filter-floor-max'];

	if(isset($req_filter_square_min) && $req_filter_square_max) {
		$query["meta_query"][] = [
			'key' => 'project-props_floors',
			'value' => [$req_filter_floor_min, $req_filter_floor_max],
			'type'    => 'numeric',
			'compare' => 'BETWEEN'
		];
	}

	$req_fits = $_REQUEST['filter']["fits"];

	if(isset($req_fits) && is_array($req_fits)) {
		$query['tax_query'][] = [
			'taxonomy' 	=> 'fits',
			'field'		=> 'term_id',
			'terms'		=> $req_fits
		];
	}

	$query = array_merge($wp_query->query, $query);

	query_posts($query);
?>