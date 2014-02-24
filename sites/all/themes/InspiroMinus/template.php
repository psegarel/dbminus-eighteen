<?php
/**
 * Remove unused css styles 
 */
function InspiroMinus_css_alter(&$css)
{
    unset($css[drupal_get_path('theme', 'InspiroB') . '/css/green.css']);
}
/**
 * Override or insert variables into the page template.
 */
function InspiroMinus_preprocess_page(&$vars)
{
    //to print the banners
    $banners        = InspiroMinus_show_banners($vars);
    $vars['banner'] = $banners;
}

/**
 *
 * @return <array>
 *    html markup to show banners
 */
function InspiroMinus_show_banners(&$vars)
{
	if(!empty($vars['language'])){
		$language = $vars['language']->language;
	}
	
    $banners        = InspiroB_get_banners(FALSE);
    $slideshowSpeed = check_plain(theme_get_setting('slideshowSpeed', 'InspiroB'));
    $slideshowEffect = check_plain(theme_get_setting('slideshowEffect', 'InspiroB'));
	$backgroundButtonText = check_plain(theme_get_setting('backgroundButtonText', 'InspiroB'));
    $output         = 'var slideshowSpeed = ' . $slideshowSpeed . '000;';
	$output .= "\n";
	$output .= 'var slideEffect = "' . $slideshowEffect . '";';
    $output .= "\n";
	$output .= "jQuery(document).ready(function($) {";
    $output .= "$('headerimgs').bgimgSlideshow({photos : [";
    $slidepath = variable_get('file_public_path', conf_path() . '/files/');
	
    for ($i = 0; $i < count($banners); $i++) {	
		$title = _InspiroMinus_get_title($banners[$i] , $language);
        $output .= '{ 
			"firstline" : "' . t('@image_title', array(
            '@image_title' => $title
        )) . '",
			"secondline" : "' . preg_replace("/\r?\n/", "\\n", addslashes(t('@image_desc', array(
            '@image_desc' => t($banners[$i]['image_description'])
        )))) . '",	
			"url" :  "' . $banners[$i]['image_url'] . '",
			"image" : "' . file_create_url($banners[$i]['image_path']) . '",
			"link" : "<div class=\"pictured\">' . t($backgroundButtonText) . '<div>"
		},';
    }
    $output .= ']});';
	    $output .= '});';	
    drupal_add_js($output, 'inline');
	
	
}

function _InspiroMinus_get_title($banner , $language)
{
	switch($language)
	{
		case 'zh-hans':
			return t($banner['image_chinese_title']);
			break;
			
		default:
			return t($banner['image_title']);
			break;
	}
	
}
