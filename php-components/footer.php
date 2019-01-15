<footer class="site-footer">
	

	<div class="author-featurette">
		
		<img class="author-img" src="<?php echo IMG_ADDR."/authors/chris.jpg"; ?>" />
		<h3>Chris</h3>
				
		<div class="author-networks">
			<ul>
				<li>
					<a href="http://fr.linkedin.com/pub/chris-mitel/23/774/69" target="_blank"><div class="sprite sprite-linkedin-36x36"></div></a>
				</li>
				<li>
					<a href="https://twitter.com/mitelchris"  target="_blank"><div class="sprite sprite-twitter-36x36"></div></a>
				</li>
			</ul>
		</div>
	</div>

	<div class="author-featurette">
	<img class="author-img" src="<?php echo IMG_ADDR."/authors/antho.jpg"; ?>" />
		<h3>Anthony</h3>
		<div class="author-networks">
			<ul>
				<li>
					<a href="http://fr.linkedin.com/pub/anthony-morel/26/8b3/368" target="_blank"><div class="sprite sprite-linkedin-36x36"></div></a>
				</li>
				<li>
					<a href="https://twitter.com/Anthonyjlmorel"  target="_blank"><div class="sprite sprite-twitter-36x36"></div></a>
				</li>
			</ul>
		</div>
	</div>

	

	<?php 
		if( MODE === 'prod' ){
			if( !function_exists('is_user_logged_in') || !is_user_logged_in()) {
	?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-52778433-1', 'auto');
	  ga('send', 'pageview');

	</script>
	<?php }
		} 
	?>

	

</footer>