<?php
/**
 * @file
 * inspiro_content.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function inspiro_content_user_default_permissions() {
  $permissions = array();

  // Exported permission: access comments.
  $permissions['access comments'] = array(
    'name' => 'access comments',
    'roles' => array(
      0 => 'anonymous user',
      1 => 'authenticated user',
    ),
    'module' => 'comment',
  );

  // Exported permission: access content.
  $permissions['access content'] = array(
    'name' => 'access content',
    'roles' => array(
      0 => 'anonymous user',
      1 => 'authenticated user',
    ),
    'module' => 'node',
  );

  // Exported permission: access site-wide contact form.
  $permissions['access site-wide contact form'] = array(
    'name' => 'access site-wide contact form',
    'roles' => array(
      0 => 'anonymous user',
      1 => 'authenticated user',
    ),
    'module' => 'contact',
  );

  // Exported permission: administer blocks.
  $permissions['administer blocks'] = array(
    'name' => 'administer blocks',
    'roles' => array(),
    'module' => 'block',
  );

  // Exported permission: administer ckeditor.
  $permissions['administer ckeditor'] = array(
    'name' => 'administer ckeditor',
    'roles' => array(),
    'module' => 'ckeditor',
  );

  // Exported permission: administer imce.
  $permissions['administer imce'] = array(
    'name' => 'administer imce',
    'roles' => array(
      0 => 'authenticated user',
    ),
    'module' => 'imce',
  );

  // Exported permission: customize ckeditor.
  $permissions['customize ckeditor'] = array(
    'name' => 'customize ckeditor',
    'roles' => array(),
    'module' => 'ckeditor',
  );

  // Exported permission: post comments.
  $permissions['post comments'] = array(
    'name' => 'post comments',
    'roles' => array(
      0 => 'anonymous user',
      1 => 'authenticated user',
    ),
    'module' => 'comment',
  );

  // Exported permission: search content.
  $permissions['search content'] = array(
    'name' => 'search content',
    'roles' => array(
      0 => 'anonymous user',
    ),
    'module' => 'search',
  );

  // Exported permission: subscribe to newsletters.
  $permissions['subscribe to newsletters'] = array(
    'name' => 'subscribe to newsletters',
    'roles' => array(
      0 => 'anonymous user',
      1 => 'authenticated user',
    ),
    'module' => 'simplenews',
  );

  // Exported permission: use advanced search.
  $permissions['use advanced search'] = array(
    'name' => 'use advanced search',
    'roles' => array(
      0 => 'anonymous user',
    ),
    'module' => 'search',
  );

  // Exported permission: use text format ckeditor.
  $permissions['use text format ckeditor'] = array(
    'name' => 'use text format ckeditor',
    'roles' => array(),
    'module' => 'filter',
  );

  return $permissions;
}
