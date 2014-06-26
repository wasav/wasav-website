<?php
	
	require_once SITE_ROOT_PATH."/pages/imgs-utils.php";
	
	$headerImg = SITE_WEB_ADDR.'/imgs/app-default-imgs/'.pickRandomImgs(SITE_ROOT_PATH.'/imgs/app-default-imgs');
	
	if(!isset($active)){
		$active = 'blog';
	}
	
	if(!isset($_GET['p'])){
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
			$large_image_url = wp_get_attachment_image_src($imgId )[0];	
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
<header class="site-header <?php echo $additionnalClass; ?>">
<?php 
	if($mode === 'general-header'){
		// not in wp particular post
		// personalize between main loop posts page, labs and contact
?>
<div class="image-src" style="background-image:url('<?php echo $headerImg; ?>')">
</div>
<div class="title">
	<h1 class="site-title"><?php echo SITE_HEADER_TITLE; ?></h1>
</div>

<?php } else if($mode === 'post-request'){
?>
	<div class="image-src" style="background-image:url('<?php echo $large_image_url; ?>')">
	</div>	
	<div class="title">
		<h1><?php the_title(); ?></h1>
		<span>By 
		<?php the_author_meta('display_name',$author_id); ?> in <?php the_category(' '); ?>
		</span>
	</div>
	
<?php } else if($mode === '404'){ ?>
	<div class="image-src" style="background-image:url('<?php echo $headerImg; ?>')">
	</div>
	<div class="title title-404">
		<h1>Page Not Found</h1>
	</div>
<?php } else if($mode === 'labs'){ ?>
	<div class="image-src" style="background-image:url('<?php echo $headerImg; ?>')">
	</div>
	<div class="title">
		<h1><?php echo $GLOBALS['labs'][$GLOBALS['selectedLab']]['title']; ?></h1>
	</div>
<?php } ?>
<div class="menu">
	<ul>
		<li <?php if($active === 'blog'){ echo 'class="active"';}else{ echo 'class=""';} ?>><a href="<?php echo SITE_WEB_ADDR; ?>/index.php?page=blog"><i class="glyphicon glyphicon-home"></i></a> </li>
		<li <?php if($active === 'labs'){ echo 'class="active"';}else{ echo 'class=""';} ?>><a href="<?php echo SITE_WEB_ADDR; ?>/index.php?page=labs"><i class="glyphicon glyphicon-fire"></i></a> </li>
		<li <?php if($active === 'contact'){ echo 'class="active"';}else{ echo 'class=""';} ?>><a href="<?php echo SITE_WEB_ADDR; ?>/index.php?page=contact"><i class="glyphicon glyphicon-envelope"></i></a> </li>
	</ul>
</div>
</header>