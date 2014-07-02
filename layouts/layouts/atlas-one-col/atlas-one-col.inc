<?php

/**
 * Implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Atlas one column'),
  'category' => t('Columns: 1'),
  'icon' => 'icon.png',
  'theme' => 'atlas-one-col',
  'css' => 'css/panels-layouts/atlas-one-col.css',
  'regions' => array(
  'column' => t('Content'),
  ),
);
