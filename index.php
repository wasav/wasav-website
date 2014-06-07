<?php

// TODO: to be removed in prod
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once './php-components/configuration.php';
require_once SITE_ROOT_PATH."/pages/labs-utils.php";

// Determine page
$active = 'blog';
if (isset($_GET['page'])) {
	$active = $_GET['page'];
}
if ($active === 'blog') {
	header('Location: '.BLOG_WEB_ADDR.'/');
	die;
}else if($active === 'labs'){
	$GLOBALS['labs'] = getLabInstances();
	if(isset($_GET['l'])){
		$labName = $_GET['l'];
		if(!isset($GLOBALS['labs'][$labName])){
			unset($labName);
		}else{
			$GLOBALS['selectedLab'] = $labName;
		}
	}
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
			if( isset($GLOBALS['selectedLab'])){
				include LABS_PATH."/".$GLOBALS['selectedLab']."/".$GLOBALS['labs'][$GLOBALS['selectedLab']]["index"];
			}else {
				include SITE_ROOT_PATH.'/pages/'.$active.'.php';
			}
			?>
		</div>
	</div>
<?php
		// same footer too for both
		include WP_THEME_PATH.'/footer.php';
	?>
	<!-- Not common js files from somewhere else -->
	<?php 
		if( isset($GLOBALS['selectedLab'])){
			foreach($GLOBALS['labs'][$GLOBALS['selectedLab']]["js"] as $n=>$jsName){
			
	?>
		<script type="text/javascript" src="<?php echo LABS_ADDR."/".$GLOBALS['selectedLab']."/js/".$jsName; ?>"></script>
	<?php
			}
		}
	?>
</body>
</html>