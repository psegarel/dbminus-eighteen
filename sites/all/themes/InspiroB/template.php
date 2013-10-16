<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function InspiroB_html_head_alter(&$head_elements)
{
    $head_elements['system_meta_content_type']['#attributes'] = array(
        'charset' => 'utf-8'
    );
}
/**
 * Remove unused css styles 
 */
function InspiroB_css_alter(&$css)
{
    unset($css[drupal_get_path('module', 'aggregator') . '/aggregator.css']);
    //unset($css[drupal_get_path('module', 'block') . '/block.css']);
    unset($css[drupal_get_path('module', 'book') . '/book.css']);
    unset($css[drupal_get_path('module', 'comment') . '/comment.css']);
    unset($css[drupal_get_path('module', 'field') . '/theme/field.css']);
    unset($css[drupal_get_path('module', 'filter') . '/filter.css']);
    unset($css[drupal_get_path('module', 'forum') . '/forum.css']);
    unset($css[drupal_get_path('module', 'locale') . '/locale.css']);
    unset($css[drupal_get_path('module', 'node') . '/node.css']);
    unset($css[drupal_get_path('module', 'poll') . '/poll.css']);
    unset($css[drupal_get_path('module', 'search') . '/search.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.css']);
    // unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
    //  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
    unset($css[drupal_get_path('module', 'system') . '/system.behavior.css']);
    // unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
    // unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
    unset($css[drupal_get_path('module', 'user') . '/user.css']);
    unset($css['sites/all/modules/ctools/css/ctools.css']);
    unset($css['sites/all/modules/contactinfo/css/contactinfo.css']);
    unset($css['sites/all/modules/views/css/views.css']);
    unset($css['sites/all/modules/simplenews/simplenews.css']);
}
function InspiroB_form_alter(&$form, &$form_state, $form_id)
{
    if ($form_id == 'search_block_form') {
        $form['search_block_form']['#title']                     = t('Search'); // Change the text on the label element
        $form['search_block_form']['#title_display']             = 'invisible'; // Toggle label visibilty
        $form['search_block_form']['#size']                      = 16; // define size of the textfield
        $form['search_block_form']['#default_value']             = t('Search'); // Set a default value for the textfield
        $form['actions']['submit']['#value']                     = t('GO!'); // Change the text on the submit button
        $form['actions']['submit']                               = array(
            '#type' => 'image_button',
            '#src' => base_path() . path_to_theme() . '/images/search-button.png'
        );
        $form['actions']['submit']['#attributes']['alt']         = t('Search');
        // Add extra attributes to the text box
        $form['search_block_form']['#attributes']['onblur']      = "if (this.value == '') {this.value = 'Search';}";
        $form['search_block_form']['#attributes']['onfocus']     = "if (this.value == 'Search') {this.value = '';}";
        // Prevent user from searching the default text
        $form['#attributes']['onsubmit']                         = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";
        // Alternative (HTML5) placeholder attribute instead of using the javascript
        $form['search_block_form']['#attributes']['placeholder'] = t('Search');
        // Adds a wrapper div to the whole form
    }
}
function InspiroB_menu_item_link($link)
{
    if (empty($link['localized_options'])) {
        $link['localized_options'] = array();
    }
    $link_options         = $link['localized_options'];
    $link_options['html'] = TRUE;
    if ($link['menu_name'] == "primary-links") {
        $link['title'] .= '<span class="description">' . $link['description'] . '</span>';
    }
    return l('<span>' . $link['title'] . '</span>', $link['href'], $link_options);
}
/**
 * Override or insert variables into the page template.
 */
function InspiroB_preprocess_page(&$vars)
{
    if (isset($vars['main_menu'])) {
        $vars['main_menu'] = theme('links__system_main_menu', array(
            'links' => $vars['main_menu'],
            'attributes' => array(
                'class' => array(
                    'links',
                    'main-menu',
                    'clearfix'
                )
            ),
            'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array(
                    'element-invisible'
                )
            )
        ));
    } else {
        $vars['main_menu'] = FALSE;
    }
    if (isset($vars['secondary_menu'])) {
        $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
            'links' => $vars['secondary_menu'],
            'attributes' => array(
                'class' => array(
                    'links',
                    'secondary-menu',
                    'clearfix'
                )
            ),
            'heading' => array(
                'text' => t('Secondary menu'),
                'level' => 'h2',
                'class' => array(
                    'element-invisible'
                )
            )
        ));
    } else {
        $vars['secondary_menu'] = FALSE;
    }
    // Chcek if is first setup of InspiroB and install banners.
    if (variable_get('theme_InspiroB_first_install', TRUE)) {
        include_once('theme-settings.php');
        _InspiroB_install();
    }
    //to print the banners
    $banners        = InspiroB_show_banners();
    $vars['banner'] = $banners;
}
/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function InspiroB_menu_local_tasks(&$variables)
{
    $output = '';
    if (!empty($variables['primary'])) {
        $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
        $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
        $variables['primary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['primary']);
    }
    if (!empty($variables['secondary'])) {
        $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
        $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
        $variables['secondary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['secondary']);
    }
    return $output;
}
/**
 * Override or insert variables into the node template.
 */
function InspiroB_preprocess_node(&$variables)
{
    $node = $variables['node'];
    if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
        $variables['classes_array'][] = 'node-full';
    }
}
function InspiroB_page_alter($page)
{
    // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    $viewport = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1, maximum-scale=1'
        )
    );
    drupal_add_html_head($viewport, 'viewport');
}
/**
 *
 * @return <array>
 *    html markup to show banners
 */
function InspiroB_show_banners()
{
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
        $output .= '{ 
			"firstline" : "' . t('@image_title', array(
            '@image_title' => t($banners[$i]['image_title'])
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
/**
 * Get banner settings.
 *
 * @param <bool> $all
 *    Return all banners or only active.
 *
 * @return <array>
 *    Settings information
 */
function InspiroB_get_banners($all = TRUE)
{
    // Get all banners
    $banners       = variable_get('theme_InspiroB_banner_settings', array());
    // Create list of banner to return
    $banners_value = array();
    foreach ($banners as $banner) {
        if ($all || $banner['image_published']) {
            // Add weight param to use `drupal_sort_weight`
            $banner['weight'] = $banner['image_weight'];
            $banners_value[]  = $banner;
        }
    }
    // Sort image by weight
    usort($banners_value, 'drupal_sort_weight');
    return $banners_value;
}
/**
 * Set banner settings.
 *
 * @param <array> $value
 *    Settings to save
 */
function InspiroB_set_banners($value)
{
    variable_set('theme_InspiroB_banner_settings', $value);
}
/**
 * phptemplate_preprocess
 *
 */
function phptemplate_preprocess_node(&$vars)
{
    $vars['template_files'][] = 'node-' . $vars['nid'];
    return $vars;
}


/**
 * Theme Colors
 *
 */
drupal_add_css(drupal_get_path('theme','InspiroB').'/css/'.theme_get_setting('colors', 'InspiroB'));
/**
 * Theme Homepage style
 *
 */
drupal_add_css(drupal_get_path('theme','InspiroB').'/css/'.theme_get_setting('homepage', 'InspiroB'));

/**
 * Theme RTL Mode
 *
 */

global $language ; $lang_name = $language->language ;

if($lang_name == "ar" || $lang_name == "he"){
	drupal_add_css(drupal_get_path('theme','InspiroB').'/css/style-rtl.css');
}else{
	drupal_add_css(drupal_get_path('theme','InspiroB').'/css/style-rtl-off.css');
}

