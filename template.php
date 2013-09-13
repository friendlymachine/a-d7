<?php

/**
* @file
* Template overrides as well as (pre-)process and alter hooks for the
* Basis theme.
*/

function atlas_preprocess_html(&$variables) {
	drupal_add_js(drupal_get_path('theme', 'atlas') .'/js/atlas.js');
  drupal_add_js(drupal_get_path('theme', 'atlas') .'/js/responsive-tables.js');
  drupal_add_css(drupal_get_path('theme', 'atlas') .'/css/responsive-tables.css');
  drupal_add_css('http://fonts.googleapis.com/css?family=Lato:300,400,300italic', array('type' => 'external', 'weight' => 0,)); 
}

 
 // breadcrumbs
 
function atlas_breadcrumb($variables) {
	
  if (count($variables['breadcrumb']) > 0) {
    $lastitem = sizeof($variables['breadcrumb']);
    $title = drupal_get_title();
    $crumbs = '<ul class="breadcrumb">';
    $a=1;
    foreach($variables['breadcrumb'] as $value) {
        if ($a!=$lastitem){
         $crumbs .= '<li class="breadcrumb-'.$a.'">'. $value . ' ' . '</li>' . '<li class="breadcrumb-sep">'. '&frasl;' . ' ' . '</li>';
         $a++;
        }
				  
				  else {
            $crumbs .= '<li class="breadcrumb-last">' . $value . '</li>';          }
    }
    $crumbs .= '</ul>';
  return $crumbs;
  }
 
}
 
 
