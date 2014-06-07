<div class="labs">

<?php
	if( isset($GLOBALS['labs'])){
		
		foreach($GLOBALS['labs'] as $labName=>$cfg){
			
?>
<div class="lab-area">
	<?php require LABS_PATH."/".$labName."/".$cfg["excerpt"]; ?>
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
