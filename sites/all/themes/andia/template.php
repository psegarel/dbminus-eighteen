<?php

function andia_preprocess_html(&$vars) 
{
	$data = array('external'	=> 'http://maps.google.com/maps/api/js?sensor=true');
	$options = array('weight'	=> 6);
	drupal_add_js($data , $options);
}