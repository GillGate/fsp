<?php 
	
	define('THEME_ROOT', get_template_directory_uri());
	define('CSS_DIR', THEME_ROOT . '/css');
	define('JS_DIR', THEME_ROOT . '/js');
	define('IMG_DIR', THEME_ROOT . '/img');

	add_action('wp_enqueue_scripts', function() {
		wp_enqueue_style('main-style', CSS_DIR . '/style.min.css');
		wp_enqueue_style('dev-style', CSS_DIR . '/dev.css');
		wp_enqueue_style('theme-style', get_stylesheet_uri());

		wp_enqueue_script('all', JS_DIR . '/all.js', [], null, true);
		wp_enqueue_script('dev', JS_DIR . '/dev.js', [], null, true);
	});

	add_filter('show_admin_bar', '__return_false');

	add_action('after_setup_theme', function() {
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
	});

	function true_remove_default_image_sizes( $sizes ) {
		unset( $sizes['thumbnail']); // отключаем миниатюры
		unset( $sizes['medium']); // отключаем средний размер
		unset( $sizes['large']); // отключаем крупный размер
		return $sizes;
	}
	 
	add_filter('intermediate_image_sizes_advanced', 'true_remove_default_image_sizes');

	add_action( 'init', 'register_post_types' );
	function register_post_types(){
		include_once('functions/post.php');
	}

	add_action( 'init', 'register_taxonomies' );
	function register_taxonomies(){
		include_once('functions/taxonomy.php');
	}

	add_action( 'wpcf7_mail_sent', 'wpcf7_mail_sent_function' );

	function wpcf7_mail_sent_function( $contact_form ) {
		$title = $contact_form->title;
		$queryUrl = 'https://rekonstroygroup.bitrix24.ru/rest/1/zmkl4kheasf46ab9/crm.lead.add.json';
		if ('Контактная форма' == $title ) { 
			$name = $_POST['order-name']; 
			$phone = $_POST['order-phone']; 
			$email = $_POST['order-email']; 
			$comment = $_POST['order-more']; 
			$project = $_POST['order-project'];
			$decor_ext = $_POST['order-decor-ext'];
			$decor_in = $_POST['order-decor-in'];
			$source = $_POST['utm_source']; 
			$medium = $_POST['utm_medium']; 
			$campaign = $_POST['utm_campaign']; 
			$term = $_POST['utm_term']; 
			$device = $_POST['utm_content'];
			$queryData = http_build_query(array( 
				'fields' => array( 
					'TITLE' => "Лид с формы на сайте по номеру $phone от $email ", 
					'NAME' => $name,
					'COMMENTS' => "
						Данные с формы: \r\n
						Имя: $name \r\n
						Почта: $email, \r\n
						Телефон: $phone \r\n
						Проект: $project \r\n
						Вариант внешенй отделки: $decor_ext \r\n
						Вариант внутренней отделки: $decor_in \r\n
						Дополнительная информация: \r\n
						$comment \r\n
					",
					'UTM_SOURCE'=>$source, 
					'UTM_MEDIUM'=>$medium, 
					'UTM_CAMPAIGN'=>$campaign, 
					'UTM_TERM'=>$term, 
					'UTM_CONTENT'=>$device, 
				),
				'params' => array("REGISTER_SONET_EVENT" => "Y") 
			)); 
			$curl = curl_init(); 
			curl_setopt_array($curl, array( 
			 CURLOPT_SSL_VERIFYPEER => 0, 
			 CURLOPT_POST => 1, 
			 CURLOPT_HEADER => 0, 
			 CURLOPT_RETURNTRANSFER => 1, 
			 CURLOPT_URL => $queryUrl, 
			 CURLOPT_POSTFIELDS => $queryData, 
			)); 
			$result = curl_exec($curl); 
			curl_close($curl); 
			$result = json_decode($result, 1); 
			if (array_key_exists('error', $result)) { 
				echo "Ошибка при сохранении лида: ".$result['error_description']."";
			}
		}
	}