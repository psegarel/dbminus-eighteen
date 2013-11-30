<?php
/**
 * Remove unused css styles 
 */
function InspiroMinus_css_alter(&$css)
{
    unset($css[drupal_get_path('theme', 'InspiroB') . '/css/green.css']);
}