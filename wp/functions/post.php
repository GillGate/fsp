<?php 
	register_post_type('project', [
		'label'  => null,
		'labels' => [
			'name'               => 'Проекты', // основное название для типа записи
			'singular_name'      => 'Проект', // название для одной записи этого типа
			'add_new'            => 'Добавить новый проект', // для добавления новой записи
			'add_new_item'       => 'Добавить новый проект', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактировать проект', // для редактирования типа записи
			'new_item'           => '', // текст новой записи
			'view_item'          => 'Посмотреть список', // для просмотра записи этого типа.
			'search_items'       => 'Найти', // для поиска по этим типам записи
			'not_found'          => 'Проекты не найдены', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => '', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Проекты', // название меню
		],
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-admin-multisite',
		'hierarchical'        => false,
		'has_archive'		  => true,
		'supports'            => [ 'title', 'editor', 'thumbnail']
	] );

	register_post_type('review', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы', // основное название для типа записи
			'singular_name'      => 'Отзыв', // название для одной записи этого типа
			'add_new'            => 'Добавить новый отзыв', // для добавления новой записи
			'add_new_item'       => 'Добавить новый отзыв', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактировать отзыв', // для редактирования типа записи
			'new_item'           => '', // текст новой записи
			'view_item'          => 'Посмотреть список', // для просмотра записи этого типа.
			'search_items'       => 'Найти', // для поиска по этим типам записи
			'not_found'          => 'Отзывы не найдены', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => '', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Отзывы', // название меню
		],
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-text-page',
		'hierarchical'        => false,
		'has_archive'		  => true,
		'supports'            => [ 'title', 'editor', 'thumbnail']
	] );

	function getCatalog($count = 7, $purpose = 'residential') {
		$args = [
			'post_type'   => 'project',
			'orderby'     => 'date',
			'order'       => 'desc',
			'numberposts' => $count,
			'purpose'	  => $purpose,
			'meta_key' => 'project-popular',
		];

		$catalog = [];

		foreach (get_posts($args) as $post) {
			$product = get_fields($post->ID);

			$product['project-id'] = $post->ID;
			$product['project-title'] = $post->post_title;
			$product['project-img'] = get_the_post_thumbnail($post->ID);
			$product['project-link'] = get_permalink($post->ID);

			$catalog[] = $product;
		}

		return $catalog;
	}

	function getReviews($count = -1) {
		$args = [
			'post_type'   => 'review',
			'orderby'     => 'date',
			'order'       => 'desc',
			'numberposts' => $count,
		];

		$reviews = [];

		foreach (get_posts($args) as $post) {
			$review = get_fields($post->ID);

			$review['review-id'] = $post->ID;
			$review['review-title'] = $post->post_title;
			$review['review-content'] = $post->post_content;
			$review['review-img'] = get_the_post_thumbnail($post->ID);

			$reviews[] = $review;
		}

		return $reviews;
	}