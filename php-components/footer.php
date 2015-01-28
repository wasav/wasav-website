<footer>
	<a name="about-anchor"></a>
	<div class="content">
		<div class="authors">
			<div>
				<div>Antho</div>
				<div class="author-networks">
					<ul>
						<li>
							<a href="http://fr.linkedin.com/pub/anthony-morel/26/8b3/368" target="_blank"><img src="<?php echo IMG_ADDR."/networks/linkedin_44x36.png"; ?>" alt="View Anthony's LinkedIn profile" style="vertical-align:middle" border="0"></a>
						</li>
						<li>
							<a href="https://twitter.com/Anthonyjlmorel" target="_blank"><img src="<?php echo IMG_ADDR."/networks/twitter_36.png"; ?>" alt="View Anthony's Twitter profile" style="vertical-align:middle" border="0"></a>
						</li>
					</ul>
				</div>
			</div>
			<div>
				<div>Chris</div>
				<div class="author-networks">
					<ul>
						<li>
							<a href="http://fr.linkedin.com/pub/chris-mitel/23/774/69" target="_blank"><img src="<?php echo IMG_ADDR."/networks/linkedin_44x36.png"; ?>" alt="View Chris's LinkedIn profile" style="vertical-align:middle" border="0"></a>
						</li>
						<li>
							<a href="https://plus.google.com/u/0/110874636852270077529/posts" target="_blank"><img src="<?php echo IMG_ADDR."/networks/google_36.png"; ?>" alt="View Chris's Twitter profile" style="vertical-align:middle" border="0"></a>
						</li>
					</ul>
				</div>
			</div>
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