<?php
	
	if(!isset($active)){
		$active = 'blog';
	}
?>
<header class="site-header">
<?php 
	if(!isset($_GET['p'])){
		// not in wp particular post
		// personalize between main loop posts page, labs and contact
?>
<div class="image-src main-image"></div>
<?php } else{
		// a post is requested, display the thumbnail image
		// TODO : display the title of the post instead of the blog name
		$imgId = get_post_thumbnail_id( intval($_GET['p']) );
		
		if($imgId !== false && $imgId !== ''){
			$large_image_url = wp_get_attachment_image_src($imgId )[0];	
		}else{
			$large_image_url = SITE_WEB_ADDR.'/imgs/shine.jpg';
		}
?>
	<div class="image-src" style="background-image:url('<?php echo $large_image_url; ?>')"></div>	
<?php } ?>

<div class="title">
	<h1>Wasav</h1>
</div>
<div class="menu">
	<ul>
		<li <?php if($active === 'blog'){ echo 'class="active"';}else{ echo 'class=""';} ?>><a href="<?php echo SITE_WEB_ADDR; ?>/index.php?page=blog"><i class="glyphicon glyphicon-home"></i></a> </li>
		<li <?php if($active === 'labs'){ echo 'class="active"';}else{ echo 'class=""';} ?>><a href="<?php echo SITE_WEB_ADDR; ?>/index.php?page=labs"><i class="glyphicon glyphicon-fire"></i></a> </li>
		<li <?php if($active === 'contact'){ echo 'class="active"';}else{ echo 'class=""';} ?>><a href="<?php echo SITE_WEB_ADDR; ?>/index.php?page=contact"><i class="glyphicon glyphicon-envelope"></i></a> </li>
	</ul>
</div>
</header>