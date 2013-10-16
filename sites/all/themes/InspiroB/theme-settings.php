<?php
//
include_once 'template.php';
function InspiroB_form_system_theme_settings_alter(&$form, &$form_state)
{
    $form['theme_settings']['#collapsible']                       = TRUE;
    $form['theme_settings']['#collapsed']                         = TRUE;
    $form['logo']['#collapsible']                                 = TRUE;
    $form['logo']['#collapsed']                                   = TRUE;
    $form['favicon']['#collapsible']                              = TRUE;
    $form['favicon']['#collapsed']                                = TRUE;



	$form['IMsettings']['color']                                               = array(
        '#type' => 'fieldset',
        '#title' => t('Web site Colors'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
        '#weight' => '18'
    );
    $form['IMsettings']['color']['text']                                       = array(
        '#markup' => t('You can change feel and look of theme by using predefined homepage styles and colors.')
    );
	$form['IMsettings']['color']['homepage']                             = array(
        '#type' => 'select',
        '#title' => t('Homepage style'),
        '#type' => 'select',
        '#options' => array(
            'template.css' => t('Multipurpose (InspiroB default)'),
            'restaurant.css' => t('Hotel & Restaurant'),
            'fashion.css' => t('Fashion'),
            'architecture.css' => t('Architecture'),
            'nonprofit.css' => t('Non-profit'),
        ),
        '#default_value' => theme_get_setting('homepage', 'InspiroB')
    );
    $form['IMsettings']['color']['colors']                             = array(
        '#type' => 'select',
        '#title' => t('Color'),
        '#type' => 'select',
        '#options' => array(
            'none.css' => t('Default'),
            'red.css' => t('Red'),
            'blue.css' => t('Blue'),
     		'navy.css' => t('Navy'),
            'green.css' => t('Green'),
            'lemon.css' => t('Lemon'),
            'ice.css' => t('Ice'),
            'firehouse.css' => t('Firehouse'),
     		'black.css' => t('Black'),
     		'plum.css' => t('Plum'),

			
        ),
        '#default_value' => theme_get_setting('colors', 'InspiroB')
    );
	
  $form['IMsettings']['top_social_link'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social links in header'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
      $form['IMsettings']['top_social_link']['text']                                       = array(
        '#markup' => t('Your Social Networks. Note: You can chose only 3 icons to be shown on your website, others should be empty.')
    );
    $form['IMsettings']['top_social_link']['twitter_username']    = array(
        '#type' => 'textfield',
        '#title' => t('Twitter Username'),
        '#default_value' => theme_get_setting('twitter_username', 'InspiroB'),
        '#description' => t("Enter your Twitter username. /Leave empty to disable this option")
    );
    $form['IMsettings']['top_social_link']['facebook_username']   = array(
        '#type' => 'textfield',
        '#title' => t('Facebook Username'),
        '#default_value' => theme_get_setting('facebook_username', 'InspiroB'),
        '#description' => t("Enter your Facebook username. /Leave empty to disable this option")
    );
    $form['IMsettings']['top_social_link']['googleplus_username'] = array(
        '#type' => 'textfield',
        '#title' => t('Google +'),
        '#default_value' => theme_get_setting('googleplus_username', 'InspiroB'),
        '#description' => t("Link to your Google plus. /Leave empty to disable this option")
    );
	$form['IMsettings']['top_social_link']['youtube_username'] = array(
        '#type' => 'textfield',
        '#title' => t('YouTube'),
        '#default_value' => theme_get_setting('youtube_username', 'InspiroB'),
        '#description' => t("Link to your YouTube page or username (Full URL path ex: www.youtube.com/user/username) /Leave empty to disable this option")
    );
	$form['IMsettings']['top_social_link']['rss'] = array(
        '#type' => 'textfield',
        '#title' => t('RSS'),
        '#default_value' => theme_get_setting('rss', 'InspiroB'),
        '#description' => t("Link to your RSS page. (Full URL path ex: www.example.com/rssfeed) /Leave empty to disable this option")
    );
	
    $form['IMsettings']['language_options']                       = array(
        '#type' => 'fieldset',
        '#title' => t('Web site languages'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE
    );
    $form['IMsettings']['language_options']['language_links']     = array(
        '#type' => 'checkbox',
        '#title' => t('Show active and translated languages in header'),
        '#default_value' => theme_get_setting('language_links', 'InspiroB'),
        '#description' => t("Check this option to show languages in header. Uncheck to hide.")
    );
    $form['banner']                                               = array(
        '#type' => 'fieldset',
        '#title' => t('Web site background Slideshow'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
        '#weight' => '18'
    );
    $form['banner']['text']                                       = array(
        '#markup' => t('You can change the tiltes, descriptions, links, and images of each slide in the following Slide Setting fieldsets.')
    );
    $form['banner']['slideshowSpeed']                             = array(
        '#type' => 'select',
        '#title' => t('Slideshow speed'),
        '#type' => 'select',
        '#options' => array(
            3 => t('3'),
            5 => t('5'),
            10 => t('10'),
            15 => t('15'),
            20 => t('20')
        ),
        '#default_value' => theme_get_setting('slideshowSpeed', 'InspiroB')
    );
	$form['banner']['slideshowEffect']                             = array(
        '#type' => 'select',
        '#title' => t('Slideshow Effect'),
        '#type' => 'select',
        '#options' => array(
            "fade" => t('Fade (Default)'),
            "slide" => t('Slide'),
            "slideup" => t('Slide Up'),
            "swing" => t('Swing'),
            "none" => t('Simple (without any effect)')
        ),
        '#default_value' => theme_get_setting('slideshowEffect', 'InspiroB')
    );
	$form['banner']['backgroundPattern']     = array(
        '#type' => 'checkbox',
        '#title' => t('Show Pattern over Background images. Uncheck to hide!'),
        '#default_value' => theme_get_setting('backgroundPattern', 'InspiroB'),
    );
	$form['banner']['backgroundControls']     = array(
        '#type' => 'checkbox',
        '#title' => t('Show Background Slideshow controls (next, prev. pause, play)'),
        '#default_value' => theme_get_setting('backgroundControls', 'InspiroB'),
    );
	$form['banner']['backgroundText']     = array(
        '#type' => 'checkbox',
        '#title' => t('Show tiltes, descriptions for banners. Uncheck to hide!'),
        '#default_value' => theme_get_setting('backgroundText', 'InspiroB'),
    );
	$form['banner']['backgroundButton']     = array(
        '#type' => 'checkbox',
        '#title' => t('Show VIEW MORE button, Uncheck to hide!'),
        '#default_value' => theme_get_setting('backgroundButton', 'InspiroB'),
    );
	$form['banner']['backgroundButtonText']     = array(
        '#type' => 'textfield',
        '#title' => t('Write down title for VIEW MORE button'),
        '#default_value' => theme_get_setting('backgroundButtonText', 'InspiroB'),
    );
    //BACKGROUND 1
    $form['banner']['images']                                     = array(
        '#type' => 'fieldset',
        '#title' => t('First slide'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE
    );
    // Image upload section ======================================================
    $banners                                                      = InspiroB_get_banners();
    $form['banner']['images']                                     = array(
        '#type' => 'vertical_tabs',
        '#title' => t('Banner images'),
        '#weight' => 2,
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
        '#tree' => TRUE
    );
    $i                                                            = 0;
    foreach ($banners as $image_data) {
        $form['banner']['images'][$i] = array(
            '#type' => 'fieldset',
            '#title' => t('Image !number: !title', array(
                '!number' => $i + 1,
                '!title' => $image_data['image_title']
            )),
            '#weight' => $i,
            '#collapsible' => TRUE,
            '#collapsed' => FALSE,
            '#tree' => TRUE,
            // Add image config form to $form
            'image' => _InspiroB_banner_form($image_data)
        );
        $i++;
    }
    $form['banner']['image_upload'] = array(
        '#type' => 'file',
        '#title' => t('Upload a new slide'),
        '#weight' => $i
    );
    $form['#submit'][]              = 'InspiroB_settings_submit';
    return $form;
}
/**

* Save settings data.

*/
function InspiroB_settings_submit($form, &$form_state)
{
    $settings = array();
    // Update image field
    foreach ($form_state['input']['images'] as $image) {
        if (is_array($image)) {
            $image = $image['image'];
            if ($image['image_delete']) {
                // Delete banner file
                file_unmanaged_delete($image['image_path']);
                // Delete banner thumbnail file
                file_unmanaged_delete($image['image_thumb']);
            } else {
                // Update image
                $settings[] = $image;
            }
        }
    }
    // Check for a new uploaded file, and use that if available.
    if ($file = file_save_upload('image_upload')) {
        $file->status = FILE_STATUS_PERMANENT;
        if ($image = _InspiroB_save_image($file)) {
            // Put new image into settings
            $settings[] = $image;
        }
    }
    // Save settings
    InspiroB_set_banners($settings);
}
/**

* Provvide default installation settings for marinelli.

*/
function _InspiroB_install()
{
    // Deafault data
    $file            = new stdClass;
    $banners         = array();
    // Source base for images
    $src_base_path   = drupal_get_path('theme', 'InspiroB');
    $default_banners = theme_get_setting('default_banners');
    //print_r($default_banners);
    // Put all image as banners
    foreach ($default_banners as $i => $data) {
        $file->uri      = $src_base_path . '/' . $data['image_path'];
        $file->filename = $file->uri;
        $banner         = _InspiroB_save_image($file);
        unset($data['image_path']);
        $banner      = array_merge($banner, $data);
        $banners[$i] = $banner;
    }
    // Save banner data
    InspiroB_set_banners($banners);
    // Flag theme is installed
    variable_set('theme_InspiroB_first_install', FALSE);
}
/**

* Save file uploaded by user and generate setting to save.

*

* @param <file> $file

*    File uploaded from user

*

* @param <string> $banner_folder

*    Folder where save image

*

* @param <string> $banner_thumb_folder

*    Folder where save image thumbnail

*

* @return <array>

*    Array with file data.

*    FALSE on error.

*/
function _InspiroB_save_image($file, $banner_folder = 'public://inspirob/slide/', $banner_thumb_folder = 'public://inspirob/slide/thumb/')
{
    // Check directory and create it (if not exist)
    _InspiroB_check_dir($banner_folder);
    _InspiroB_check_dir($banner_thumb_folder);
    $parts        = pathinfo($file->filename);
    $destination  = $banner_folder . $parts['basename'];
    $setting      = array();
    $file->status = FILE_STATUS_PERMANENT;
    // Copy temporary image into banner folder
    if ($img = file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
        // Generate image thumb
        $image         = image_load($destination);
        $small_img     = image_scale($image, 300, 100);
        $image->source = $banner_thumb_folder . $parts['basename'];
        image_save($image);
        // Set image info
        $setting['image_path']        = $destination;
        $setting['image_thumb']       = $image->source;
        $setting['image_title']       = '';
        $setting['image_description'] = '';
        $setting['image_url']         = '';
        $setting['image_weight']      = 0;
        $setting['image_published']   = FALSE;
        return $setting;
    }
    return FALSE;
}
/**

* Check if folder is available or create it.

*

* @param <string> $dir

*    Folder to check

*/
function _InspiroB_check_dir($dir)
{
    // Normalize directory name
    $dir = file_stream_wrapper_uri_normalize($dir);
    // Create directory (if not exist)
    file_prepare_directory($dir, FILE_CREATE_DIRECTORY);
}
/**

* Generate form to mange banner informations

*

* @param <array> $image_data

*    Array with image data

*

* @return <array>

*    Form to manage image informations

*/
function _InspiroB_banner_form($image_data)
{
    $img_form                      = array();
    // Image preview
    $img_form['image_preview']     = array(
        '#markup' => theme('image', array(
            'path' => $image_data['image_thumb']
        ))
    );
    // Image path
    $img_form['image_path']        = array(
        '#type' => 'hidden',
        '#value' => $image_data['image_path']
    );
    // Thumbnail path
    $img_form['image_thumb']       = array(
        '#type' => 'hidden',
        '#value' => $image_data['image_thumb']
    );
    // Image title
    $img_form['image_title']       = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#default_value' => $image_data['image_title']
    );
    // Image description
    $img_form['image_description'] = array(
        '#type' => 'textarea',
        '#title' => t('Description'),
        '#default_value' => $image_data['image_description']
    );
    // Link url
    $img_form['image_url']         = array(
        '#type' => 'textfield',
        '#title' => t('Url'),
        '#default_value' => $image_data['image_url']
    );
    // Image weight
    $img_form['image_weight']      = array(
        '#type' => 'weight',
        '#title' => t('Weight'),
        '#default_value' => $image_data['image_weight']
    );
    // Image is published
    $img_form['image_published']   = array(
        '#type' => 'checkbox',
        '#title' => t('Published'),
        '#default_value' => $image_data['image_published']
    );
    // Delete image
    $img_form['image_delete']      = array(
        '#type' => 'checkbox',
        '#title' => t('Delete image.'),
        '#default_value' => FALSE
    );
    return $img_form;
}