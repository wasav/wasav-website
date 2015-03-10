<div class="sharing-buttons">
<span>Share it !</span>

<div>

<?php 
	$twitterHashtag = "WasavBlog";
	if(isset($active)){
		if($active === 'labs'){
			$twitterHashtag = "WasavLabs";
		}
	}
	
?>

<!-- Twitter  -->
<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true" data-count="none" data-hashtags="<?php echo $twitterHashtag; ?>">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!-- Google+ -->
<div class="g-plus" data-action="share" data-annotation="none"></div>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<!-- End Google+ -->

<!-- Linked In  -->
<script type="IN/Share" data-url="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"></script>
<script src="//platform.linkedin.com/in.js" type="text/javascript">
  lang: en_US
</script>

</div>
</div>