<?php

/**
 * Implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Atlas two 50% columns'),
  'category' => t('Columns: 2'),
  'icon' => 'icon.png',
  'theme' => 'atlas-two-col',
  'css' => 'css/panels-layouts/atlas-two-col.css',
  'regions' => array(
  'left' => t('Left column'),
  'right' => t('Right column'),
  ),
);
