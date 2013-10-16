<?php
/**
 * @file
 * inspiro_content.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function inspiro_content_taxonomy_default_vocabularies() {
  return array(
    'newsletter' => array(
      'name' => 'Newsletter',
      'machine_name' => 'newsletter',
      'description' => 'Simplenews newsletter categories.',
      'hierarchy' => '0',
      'module' => 'simplenews',
      'weight' => '0',
    ),
  );
}
