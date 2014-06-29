<div class="labs">

<?php
	if( isset($GLOBALS['labs'])){
		$i=0;
		foreach($GLOBALS['labs'] as $labName=>$cfg){
			
?>
	<div class="lab-area">
		<img class="lab-area-img <?php echo $i % 2 === 0 ? 'pull-right' : 'pull-left'; ?>" src="<?php echo LABS_ADDR.'/'.$labName.'/excerpt-img.png' ?>" />
		<a class="<?php echo $i % 2 === 0 ? 'align-left' : 'align-right'; ?>" href="<?php echo SITE_WEB_ADDR."/?page=labs&l=".$labName; ?>"><h2><?php echo $cfg['title']; ?></h2></a>
		<p class="lab-description <?php echo $i % 2 === 0 ? 'align-left' : 'align-right'; ?>">
			<?php require LABS_PATH."/".$labName."/".$cfg["excerpt"]; ?>
		</p>
		<div class="supported-browsers">
			
			<?php if(array_key_exists("browsers",$cfg)){ ?>
			<div class="desktop-browsers">
				<div class="platform-icon desktop-icon">
				</div>
				<ul>
				<?php
					foreach($cfg["browsers"] as $name=>$versions){
				?>
					<li><div class="browser-icon <?php echo $name; ?>-icon" title="<?php echo implode(',',$versions); ?>"></div></li>
				<?php
					}
				?>
				</ul>
			</div>
			<?php	}
				if(array_key_exists("mobiles",$cfg)){
			?>
			<div class="mobile-browsers">
				<div class="platform-icon mobile-devices-icon">
				</div>
				<ul>
				<?php
					foreach($cfg["mobiles"] as $name=>$versions){
				?>
					<li><div class="browser-icon <?php echo $name; ?>-icon" title="<?php echo implode(',',$versions); ?>"></div></li>
				<?php
					}
				?>
				</ul>
			</div>
			<?php } ?>
			
		</div>
	</div>
	<hr/>
<?php
			$i++;
		}
	}else{
	
?>
		<p>Experiments are coming ...</p>
<?php
	}
?>
</div>
