<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 * Special thanks to all the Drupal devs I have learned from and that have inspired the code below...
 */


function atlas_preprocess_html(&$variables, $hook) {

  drupal_add_css('http://fonts.googleapis.com/css?family=Roboto:300,400,500', array('type' => 'external', 'weight' => 0,));
  drupal_add_js(drupal_get_path('theme', 'atlas') .'/js/scripts.js');

  // get rid of .no-sidebars class that Drupal adds
  //$variables['classes_array'] = array_diff($variables['classes_array'], array(
  //  'no-sidebars',
  //));
}

function atlas_css_alter(&$css) {
  // Remove Drupal core css
  $exclude = array(
    'modules/aggregator/aggregator.css' => FALSE,
    'modules/block/block.css' => FALSE,
    'modules/book/book.css' => FALSE,
    'modules/comment/comment.css' => FALSE,
    'modules/dblog/dblog.css' => FALSE,
    'modules/field/theme/field.css' => FALSE,
    'modules/file/file.css' => FALSE,
    'modules/filter/filter.css' => FALSE,
    'modules/forum/forum.css' => FALSE,
    'modules/help/help.css' => FALSE,
    'modules/menu/menu.css' => FALSE,
    'modules/node/node.css' => FALSE,
    'modules/openid/openid.css' => FALSE,
    'modules/poll/poll.css' => FALSE,
    'modules/profile/profile.css' => FALSE,
    'modules/search/search.css' => FALSE,
    'modules/statistics/statistics.css' => FALSE,
    'modules/syslog/syslog.css' => FALSE,
    'modules/system/admin.css' => FALSE,
    'modules/system/maintenance.css' => FALSE,
    'modules/system/system.css' => FALSE,
    'modules/system/system.admin.css' => FALSE,
    'modules/system/system.base.css' => FALSE,
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.messages.css' => FALSE,
    'modules/system/system.menus.css' => FALSE,
    'modules/system/system.theme.css' => FALSE,
    'modules/taxonomy/taxonomy.css' => FALSE,
    'modules/tracker/tracker.css' => FALSE,
    'modules/update/update.css' => FALSE,
    'modules/user/user.css' => FALSE,
    'misc/vertical-tabs.css' => FALSE,
    // Remove contrib module CSS
    drupal_get_path('module', 'views') . '/css/views.css' => FALSE,
  );
  $css = array_diff_key($css, $exclude);
}

/**
*  The three functions below are adapted from https://gist.github.com/henrijs/6225177
*  Drupal menus can be tough to work with. What this does is add a 'data-menu-parent' attribute to the
*  li that is read in the subsequent function and assigned to a variable and then in the last function assigned
*  as a class to assist in styling the menus. PITA! But it works.
*/

function atlas_menu_link(&$variables) {
  $element = $variables['element'];
  $sub_menu = '';

  $element['#attributes']['data-menu-parent'] = $element['#original_link']['menu_name'] . '-' .         $element['#original_link']['depth'];

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function atlas_preprocess_menu_tree(&$variables) {
  $tree = new DOMDocument();
  @$tree->loadHTML($variables['tree']);
  $links = $tree->getElementsByTagname('li');
  $parent = '';

  foreach ($links as $link) {
    $parent = $link->getAttribute('data-menu-parent');
    break;
  }

  $variables['menu_parent'] = $parent;
}

function atlas_menu_tree(&$variables) {
  return '<ul class="menu ' . $variables['menu_parent'] . '">' . $variables['tree'] . '</ul>';
}

function atlas_page_alter(&$page) {
  // force the footer to render even if empty because region template have copyright info
    if ( !isset($page["footer"]) || empty($page["footer"])) {
        $page["footer"] = array(
            '#region' => 'footer',
            '#weight' => '-10',
            '#theme_wrappers' => array('region'));
    }
      // get rid of main content block wrapper
    if (!empty($page['content']['system_main'])) {
      $page['content']['system_main']['#theme_wrappers'] = array_diff($page['content']['system_main']['#theme_wrappers'], array('block'));
    }
}

// Gets rid of separator div in panels layouts
function atlas_panels_default_style_render_region($variables) {
  $output = '';
  $output .= implode('', $variables['panes']);
  return $output;
}
