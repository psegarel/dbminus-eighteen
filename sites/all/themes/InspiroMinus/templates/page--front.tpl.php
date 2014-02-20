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
		<?php if($social_networks):?>
			<div class="social_icons">
			  <ul>
				  <?php foreach($social_networks as $social):?>
					  <?php if($social) print $social; ?>
				  <?php endforeach;?>
			  </ul>
		  </div>
		<?php endif;?>
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
        <?php // print render($page['header_left']); ?> </nav>
      <div id="header-right"> <?php // print render($page['header_right']); ?> </div>
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
    <aside id="sidebar" role="complementary"> <?php print render($page['sidebar_first']); ?> </aside>
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
