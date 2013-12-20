<div id="wrap" class="clearfix">
  <div id="header-wrap">
      <?php print $messages; ?>
    <div id="pre-header" class="clearfix">
      <div id="logo" class="logo"> 
        
        <!-- logo & slogan -->
        
        <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
        <?php endif; ?>

        
        <!-- end. logo & slogan --> 
        
      </div>
              <?php if ($site_slogan): ?>
        <div class="site_slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      <div class="features_top_div"> 
        
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
        
        <?php print render($page['header_features']); ?> </div>
    </div>
    <div class="top_line_tb"></div>
    <header id="header" class="clearfix">
      <nav id="navigation" role="navigation">
        <div id="main-menu">
          <?php 
            if (module_exists('i18n_menu')) {
              $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
            } else {
              $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
            }
            print drupal_render($main_menu_tree);
          ?>
        </div>
        <?php print render($page['header_left']); ?> </nav>
      <div id="header-right"> <?php print render($page['header_right']); ?> </div>
    </header>
  </div>
  <?php if(!drupal_is_front_page()): ?>
  <?php $sidebarclass=" "; if($page['sidebar_first']) { $sidebarclass="sidebar-bg"; } ?>
  <div class="split_line"></div>
  <div id="primary" class="container <?php print $sidebarclass; ?> clearfix">
    <section id="content" role="main" class="clearfix">
      <?php if (theme_get_setting('breadcrumbs')): ?>
      <?php if ($breadcrumb): ?>
      <div id="breadcrumbs"><?php print $breadcrumb; ?></div>
      <?php endif;?>
      <?php endif; ?>
      <?php if ($page['content_top']): ?>
      <div id="content_top"><?php print render($page['content_top']); ?></div>
      <?php endif; ?>
      <div id="content-wrap"> <?php print render($title_prefix); ?>
        <?php if ($title): ?>
        <h1 class="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if (!empty($tabs['#primary'])): ?>
        <div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div>
        <?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
        <?php endif; ?>
        <?php print render($page['content']); ?> </div>
    </section>
    <?php if ($page['sidebar_first']): ?>
    <aside id="sidebar" role="complementary"> 
		<div class="contact-block">
		<?php 	$contact = block_load('contactinfo', 'hcard'); 
				$contact->title = '<none>';
				$output = _block_get_renderable_array(_block_render_blocks(array($contact)));
				print drupal_render($output);
		?>
		</div>
	</aside>
    <?php endif; ?>
  </div>
  <?php else: ?>
  <?php if (theme_get_setting('backgroundText', 'InspiroMinus')): ?>
  <div id="body" class="body" >
    <div>
      <div id="headertxt"><a href="#" id="firstline"></a> <a href="#" id="secondline"></a> <?php if (theme_get_setting('backgroundButton', 'InspiroMinus')): ?><a href="#" id="link"></a>   <?php endif; ?></div>
    </div>
  </div>
  <?php endif; ?>
  <?php endif; ?>
  <?php if ($page['footer']): ?>
  <?php if(!drupal_is_front_page()): ?>
  <footer id="footer-bottom" style="position:relative;">
  <?php else: ?>
  <footer id="footer-bottom" style="position:absolute;">
    <?php endif; ?>
    <div id="footer-area" class="clearfix"> <?php print render($page['footer']); ?> </div>
  </footer>
  <?php endif; ?>
</div>
