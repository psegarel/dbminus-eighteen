<!-- features top -->        
<?php if (theme_get_setting('social_links', 'InspiroMinus')): ?>
<div class="social_icons">
  <ul>
	<!-- Facebook account -->
    <?php if (theme_get_setting('facebook_username', 'InspiroMinus')): ?>
    <li><a class="social-network" href="http://www.facebook.com/<?php echo check_plain(theme_get_setting('facebook_username', 'InspiroMinus')); ?>" target="_blank" rel="me"><i class="fa fa-lg fa-facebook"></i>&nbsp;</a></li>
    <?php endif; ?><!--/ Facebook account -->
	
	<!-- Twitter account -->
    <?php if (theme_get_setting('twitter_username', 'InspiroMinus')): ?>
    <li><a class="social-network"  href="http://www.twitter.com/<?php echo check_plain(theme_get_setting('twitter_username', 'InspiroMinus')); ?>" target="_blank" rel="me"><i class="fa fa-lg fa-twitter"></i>&nbsp;</a></li>
    <?php endif; ?><!--/ Twitter account -->
	
	<!-- Google+ account -->
    <?php if (theme_get_setting('googleplus_username', 'InspiroMinus')): ?>
    <li><a class="social-network"  href="https://plus.google.com/<?php echo check_plain(theme_get_setting('googleplus_username', 'InspiroMinus')); ?>" target="_blank" rel="me"><i class="fa fa-lg fa-google-plus"></i>&nbsp;</a></li>
    <?php endif; ?><!--/ Google+ account -->
	
	<!-- Weibo account -->
	<li><a class="social-network"  href="https://weibo.com" target="_blank" rel="me">
		<i class="fa fa-lg fa-weibo"></i>&nbsp;</a>				
	</li><!--/ Weibo account -->

	<!-- Weixin account -->
	<li><a class="social-network"  href="https://wechat.com" target="_blank" rel="me">
		<img src="sites/all/themes/InspiroMinus/images/weixin.png" alt="Weixin"/></a>				
	</li><!--/ Weixin account -->
	<!-- YouTube account -->
    <?php if (theme_get_setting('youtube_username', 'InspiroMinus')): ?>
    <li><a class="social-network"  href="<?php echo check_plain(theme_get_setting('youtube_username', 'InspiroMinus')); ?>" target="_blank" rel="me"><img src="<?php print base_path() . drupal_get_path('theme', 'InspiroMinus') . '/images/youtube.png'; ?>" alt="YouTube"/></a></li>
    <?php endif; ?><!-- /YouTube account -->
	<!-- RSS -->
    <?php if (theme_get_setting('rss', 'InspiroMinus')): ?>
    <li><a class="social-network"  href="<?php echo check_plain(theme_get_setting('rss', 'InspiroMinus')); ?>" target="_blank" rel="me"><img src="<?php print base_path() . drupal_get_path('theme', 'InspiroMinus') . '/images/feed.png'; ?>" alt="RSS"/></a></li>
    <?php endif; ?><!--/ RSS -->
  </ul>
</div>
<?php endif; ?>

<!-- end .features top --> 