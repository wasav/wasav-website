<?php
	
	require_once SITE_ROOT_PATH."/pages/imgs-utils.php";
	
	$headerImg = IMG_ADDR.'/app-default-imgs/'.pickRandomImgs(IMG_PATH.'/app-default-imgs');
	
	if(!isset($active)){
		$active = 'blog';
	}
	
	if(isset($GLOBALS['enforce404'])){
		$mode = '404';
	}else if(!isset($_GET['p'])){
		if($active === 'labs' && isset($GLOBALS['selectedLab'])){
			$mode = "labs";
		}else{
			$mode = "general-header";
		}
	}else{
		$mode = "post-request";
		
		// a post is requested, display the thumbnail image
		$imgId = get_post_thumbnail_id( intval($_GET['p']) );
		if($imgId !== false && $imgId !== ''){
			$large_image_url = wp_get_attachment_image_src($imgId, "full" )[0];	
		}else{
			$large_image_url = $headerImg;
		}
		
		$post = get_post( intval($_GET['p']) );
		
		if($post === null){
			$mode = "404";
		}else{
			$author_id = intval($post->post_author);
		}
	}
	
	if($mode==='404'){ 
		$additionnalClass = 'site-header-full';
	}else{ 
		$additionnalClass = '';
	}
?>

<?php 
	if($mode === 'general-header'){
		// not in wp particular post
		// personalize between main loop posts page, labs and contact
?>
<header class="site-header">
<a name="header-anchor"></a>

<div class="image-src" style="background-image:url('<?php echo $headerImg; ?>')">
</div>
<div class="title main-title">
	<h1 class="site-title"><?php echo SITE_HEADER_TITLE; ?></h1>
</div>

</header>

<?php } else if($mode === 'post-request'){
?>
<header class="site-header-post">
	<a name="header-anchor"></a>

	<div class="title">
		<div>
			<div class="title-container">
				<hr/>
				<h1><?php the_title(); ?></h1>
				<hr/>
			</div>
		</div>
		<div class="post-meta">
			<div>
				<?php echo get_avatar( get_the_author_meta( 'ID', $author_id ), 32 ); ?>
			</div>
			<div>
				<span><?php echo get_the_author_meta('display_name', $author_id); ?></span> in <?php the_category(' '); ?>
				<span class="glyphicon glyphicon-time"></span>
				<span><?php echo getContentAverageReadingTime(get_the_content()); ?></span>
			</div>
		</div>
	</div>
</header>
<?php } else if($mode === '404'){ ?>
<header class="site-header site-header-full">
	<div class="image-src" style="background-image:url('<?php echo $headerImg; ?>')">
	</div>
	<div class="title title-404">
		<h1>Page Not Found</h1>
	</div>
	
</header>
<?php } ?>
