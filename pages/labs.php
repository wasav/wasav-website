<div class="labs">

<?php
	if( isset($GLOBALS['labs'])){
		
		foreach($GLOBALS['labs'] as $labName=>$cfg){
			
?>
<div class="lab-area">
	<a href="<?php echo SITE_WEB_ADDR."/?page=labs&l=".$labName; ?>"><h2><?php echo $labName; ?></h2></a>
	<div class="lab-description">
		<?php require LABS_PATH."/".$labName."/".$cfg["excerpt"]; ?>
	</div>
	
</div>
<?php
		}
	}else{
	
?>
	<p>No experiments for now</p>
<?php
	}
?>
</div>
