<?php
/**
 * @package setinputoptions
 */
$xpdo_meta_map['SetInputOptionsGroup']= array (
  'package' => 'setinputoptions',
  'version' => '0.1',
  'table' => 'setinputoptions_groups',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => NULL,
    'softDelete' => 0,
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
    ),
    'softDelete' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'null' => false,
      'default' => 0,
    ),
  ),
);
