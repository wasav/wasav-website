<?php
		
	// TODO: to be removed in prod
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

		
	define( 'SITE_WP_FOLDER', 'blog' );
		
	if(isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'){
		// Either at home or chris' home
		
		define( 'WEB_SITE_FOLDER', 'wasav-website' );
		define( 'SITE_WEB_ADDR', 'http://localhost/'.WEB_SITE_FOLDER);
		
		require_once "mode.php";
		
		if(MODE == 'antho'){
			// antho's dev conf
			define( 'SITE_ROOT_PATH', 'D:/Program Files/BitNami/wampstack-5.6.25-0/apache2/htdocs/' . WEB_SITE_FOLDER );
		}else{
			// chris's dev conf
			define( 'SITE_ROOT_PATH', '/var/www/html/' . WEB_SITE_FOLDER );
		}
		
	}else{
		// Prod
		define( 'WEB_SITE_FOLDER', 'dev' );
		define( 'SITE_WEB_ADDR', 'http://wasav.fr/' . WEB_SITE_FOLDER );
		define( 'SITE_ROOT_PATH', '/home/wasav/www/' . WEB_SITE_FOLDER );
		define( 'MODE', 'prod' );
	}

	define('BLOG_WEB_ADDR', SITE_WEB_ADDR.'/'.SITE_WP_FOLDER);
	define('BLOG_ROOT_PATH', SITE_ROOT_PATH.'/'.SITE_WP_FOLDER);

	define('LABS_ADDR', SITE_WEB_ADDR. '/pages/wasav-labs');
	define('LABS_PATH', SITE_ROOT_PATH. '/pages/wasav-labs');

	define('WP_THEME_ADDR', BLOG_WEB_ADDR. '/wp-content/themes/wasav-blog-theme');
	define('WP_THEME_PATH', BLOG_ROOT_PATH. '/wp-content/themes/wasav-blog-theme');
	
	define('IMG_ADDR', WP_THEME_ADDR.'/imgs');
	define('IMG_PATH', WP_THEME_PATH.'/imgs');
	
	define('SITE_NAME', 'Wasav');
	define('SITE_HEADER_TITLE', 'W');
	
	
	require "wp-mimicker.php";
