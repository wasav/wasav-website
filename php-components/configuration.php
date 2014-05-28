<?php
	// define( 'SITE_WP_FOLDER', 'wordpress' );
	define( 'SITE_WP_FOLDER', 'blog' );
	define( 'WEB_SITE_FOLDER', 'wasav-website' );

	define( 'SITE_WEB_ADDR', 'http://localhost/wasav-website');
	define( 'SITE_ROOT_PATH', '/var/www/html/' . WEB_SITE_FOLDER );
	
	// define('BLOG_WEB_ADDR', 'http://localhost/wordpress');
	// define('BLOG_ROOT_PATH', '/var/www/html/'. SITE_WP_FOLDER );

	define('BLOG_WEB_ADDR', 'http://localhost/wasav-website/blog');
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