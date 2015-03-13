<div class="labs">

<?php
	if( isset($GLOBALS['labs']) && count($GLOBALS['labs']) > 0){
		$i=0;
		$lastI = count($GLOBALS['labs']) - 1;
		foreach($GLOBALS['labs'] as $labName=>$cfg){
			
?>
	<div class="lab-area">
		<a href="<?php echo SITE_WEB_ADDR."/?page=labs&l=".$labName; ?>">
			<img class="lab-area-img <?php echo $i % 2 === 0 ? 'pull-right' : 'pull-left'; ?>" src="<?php echo LABS_ADDR.'/'.$labName.'/excerpt-img.png' ?>" />
		
			<h3 class="<?php echo $i % 2 === 0 ? 'align-left' : 'align-right'; ?>" >
				<?php echo $cfg['title']; ?>
			</h3>
		</a>
		
		<p class="lab-description">
			<?php require LABS_PATH."/".$labName."/".$cfg["excerpt"]; ?>
		</p>
		
		<div class="supported-browsers">
			
			<?php if(array_key_exists("browsers",$cfg)){ ?>
			<div class="desktop-browsers">
				<div class="platform-icon sprite sprite-desktop-icon-30x30">
				</div>
				<ul>
				<?php
					foreach($cfg["browsers"] as $name=>$versions){
				?>
					<li><div class="sprite sprite-<?php echo $name; ?>-35x35" title="<?php echo implode(',',$versions); ?>"></div></li>
				<?php
					}
				?>
				</ul>
			</div>
			<?php	}
				if(array_key_exists("mobiles",$cfg)){
			?>
			<div class="mobile-browsers">
				<div class="platform-icon sprite sprite-mobile-devices-icon-30x30">
				</div>
				<ul>
				<?php
					foreach($cfg["mobiles"] as $name=>$versions){
				?>
					<li><div class="sprite sprite-<?php echo $name; ?>-35x35" title="<?php echo implode(',',$versions); ?>"></div></li>
				<?php
					}
				?>
				</ul>
			</div>
			<?php } ?>
			
		</div>
		
	</div>
	<?php if( $i < $lastI) { ?>
	<hr/>
	<?php } ?>
<?php
			$i++;
		}
	}else{
	
?>
	<div class="align-center">
		<h2>Experiments are coming !</h2>
	</div>
		
<?php
	}
?>
</div>
