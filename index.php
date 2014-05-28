<?php

// TODO: to be removed in prod
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once './php-components/configuration.php';

// Determine page
$active = 'blog';
if (isset($_GET['page'])) {
	$active = $_GET['page'];
}
if ($active === 'blog') {
	header('Location: '.BLOG_WEB_ADDR.'/');
	die;
}

if (!file_exists(SITE_ROOT_PATH.'/pages/'.$active.'.php')) {
	$active = 'blog';
	header('Location: '.SITE_WEB_ADDR.'/');
	die;
}

include_once WP_THEME_PATH.'/header.php';

?>
	<div class="container-fluid">
		<div class="posts">
			<?php
				include SITE_ROOT_PATH.'/pages/'.$active.'.php';
			?>
		</div>
	</div>
	
	<?php
		// same footer too for both
		include WP_THEME_PATH.'/footer.php';
	?>
	<!-- Not common js files from somewhere else -->
	<script src="js/main.js"></script>
</body>
</html>