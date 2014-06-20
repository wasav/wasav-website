<?php
		
	// TODO: to be removed in prod
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

		
	define( 'SITE_WP_FOLDER', 'wp' );
		
	if(isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'){
		// Either at home or chris' home
		
		define( 'WEB_SITE_FOLDER', 'wasav-website' );
		define( 'SITE_WEB_ADDR', 'http://localhost/'.WEB_SITE_FOLDER);
				
		require_once "mode.php";
		
		if(MODE == 'antho'){
			// antho's dev conf
			define( 'SITE_ROOT_PATH', 'D:/Program Files/BitNami/wampstack-5.4.24-0/apache2/htdocs/' . WEB_SITE_FOLDER );
		}else{
			// chris's dev conf
			define( 'SITE_ROOT_PATH', '/var/www/html/' . WEB_SITE_FOLDER );
		}
		
	}else{
		// Prod
		define( 'WEB_SITE_FOLDER', '' );
		define( 'SITE_WEB_ADDR', 'http://wasav.fr' . WEB_SITE_FOLDER );
		define( 'SITE_ROOT_PATH', '/path/sur/ovh/' . WEB_SITE_FOLDER );
	}

	define('BLOG_WEB_ADDR', SITE_WEB_ADDR.'/'.SITE_WP_FOLDER);
	define('BLOG_ROOT_PATH', SITE_ROOT_PATH.'/'.SITE_WP_FOLDER);

	define('LABS_ADDR', SITE_WEB_ADDR. '/pages/labs');
	define('LABS_PATH', SITE_ROOT_PATH. '/pages/labs');

	define('WP_THEME_ADDR', BLOG_WEB_ADDR. '/wp-content/themes/wasav-blog-theme');
	define('WP_THEME_PATH', BLOG_ROOT_PATH. '/wp-content/themes/wasav-blog-theme');

	// Demos Website and Blog Theme common configuration
	// $wsv_options = array(
	// 	'SITE_ROOT_PATH', '/var/www/html/wasav-website',
	// 	'SITE_WEB_ADDR', 'http://localhost/wasav-website',
	// 	'LABS_ADDR', 'http://localhost/wasav-website/pages/labs',
	// 	'LABS_PATH', '/var/www/html/wasav-website/pages/labs',
	// 	'SITE_WP_FOLDER', 'wasav-blog',
	// 	'WP_THEME_ADDR', 'http://localhost/wasav-blog/wp-content/themes/wasav-blog-theme',
	// 	'WP_THEME_PATH', '/var/www/html/wasav-blog//wp-content/themes/wasav-blog-theme'
	// );
