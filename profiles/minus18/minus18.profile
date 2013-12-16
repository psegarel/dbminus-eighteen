<?php
/**
 * @file
 * Enables modules and site configuration for a standard site installation.
 */

/**
 * Implements hook_form_FORM_ID_alter() for install_configure_form().
 *
 * Allows the profile to alter the site configuration form.
 */
function minus18_form_install_configure_form_alter(&$form, $form_state) {
	// Pre-populate with a few default values.
	$form['site_information']['site_name']['#default_value'] = "Meno Diciotto";
	$form['site_information']['site_slogan']['#default_value'] = "the luxury Ice Cream with a passion for taste";
	$form['site_information']['site_mail']['#default_value'] = 'info@deltabridges.com';
	$form['admin_account']['account']['name']['#default_value'] = 'admin';
	$form['admin_account']['account']['mail']['#default_value'] = 'contact@patrick-segarel.com';
	
	// Date/time settings
	$form['server_settings']['site_default_country']['#default_value'] = 'CN';
	$form['server_settings']['date_default_timezone']['#default_value'] = 'Asia/Macau';
	
	// Unset the timezone detect stuff
	unset($form['server_settings']['date_default_timezone']['#attributes']['class']);
}
