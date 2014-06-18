<?php
	
	if(!isset($active)){
		$active = 'blog';
	}
	
	if(!isset($_GET['p'])){
		$mode = "general-header";
	}else{
		$mode = "post-request";
		
		// a post is requested, display the thumbnail image
		$imgId = get_post_thumbnail_id( intval($_GET['p']) );
		if($imgId !== false && $imgId !== ''){
			$large_image_url = wp_get_attachment_image_src($imgId )[0];	
		}else{
			$large_image_url = SITE_WEB_ADDR.'/imgs/shine.jpg';
		}
		
		$post = get_post( intval($_GET['p']) );
		$author_id = intval($post->post_author);
		if($post === null){
			$mode = "404";
		}
	}
?>
<header class="site-header <?php if($mode==='404'){ echo 'site-header-full';}?>">
<?php 
	if($mode === 'general-header'){
		// not in wp particular post
		// personalize between main loop posts page, labs and contact
?>
<div class="image-src main-image"></div>
<div class="title">
		<h1 class="site-title">W</h1>
</div>

<?php } else if($mode === 'post-request'){
?>
	<div class="image-src" style="background-image:url('<?php echo $large_image_url; ?>')"></div>	
	<div class="title">
		<h1><?php the_title(); ?></h1>
		<span>By 
		<?php the_author_meta('display_name',$author_id); ?> in <?php the_category(' '); ?>
		</span>
	</div>
	
<?php } else if($mode === '404'){ ?>
	<div class="image-src main-image"></div>
	<div class="title">
		<h1>Page Not Found</h1>
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