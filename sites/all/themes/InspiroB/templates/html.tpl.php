<!DOCTYPE html>

<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?><?php print $scripts; ?>

<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'InspiroB') . '/js/html5.js'; ?>"></script><![endif]-->

</head>

<body class="<?php print $classes; ?>"<?php print $attributes; ?>>

<!-- Background slideshow-->
<?php if (theme_get_setting('backgroundPattern', 'InspiroB')): ?>
<div class="patternBG" style="display: block;">&nbsp;</div>
<?php endif; ?>
<div id="headerimgs">
  <div id="headerimg1" style="z-index:-1" class="headerimg"></div>
  <div id="headerimg2" style="z-index:1" class="headerimg"></div>
</div>
<!-- end .Slideshow controls --> 

<?php if (theme_get_setting('backgroundControls', 'InspiroB')): ?>
<!-- Slideshow controls -->
<div class="fade">
  <div id="control" class="btn"></div>
</div>

<div id="back" class="btn-back"></div>
<div id="next" class="btn-next"></div>
<div id="fullscreen" class="btnf"></div>
<!-- end .Slideshow controls --> 
<?php endif; ?>

<?php print $page_top; ?> <?php print $page; ?> <?php print $page_bottom; ?>
</body>
</html>