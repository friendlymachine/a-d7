<?php
/**
 * @file
 *
 * Theme implementation to display the header block on a Drupal page.
 *
 * This utilizes the following variables thata re normally found in
 * page.tpl.php:
 * - $logo
 * - $front_page
 * - $site_name
 * - $front_page
 * - $site_slogan
 * - $search_box
 *
 * Additional items can be added via theme_preprocess_pane_header(). See
 * template_preprocess_pane_header() for examples.
 */
 ?>
<div id="header">
  <div id="logo-title">

    <?php if (!empty($logo)): ?>
      <div class="logo">
	      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
	        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
	      </a>
      </div>
    <?php endif; ?>

    <div class="site-info">
      <?php if ($site_name || $site_slogan): ?>
        <?php if ($site_name): ?>
          <h1 class="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <h4 class="site-slogan"><?php print $site_slogan; ?></h4>
        <?php endif; ?>
      <?php endif; ?>
      
    </div> <!-- /name-and-slogan -->
  </div> <!-- /logo-title -->

  <?php if (!empty($search_box)): ?>
    <div id="search-box"><?php print $search_box; ?></div>
  <?php endif; ?>
</div> <!-- /header -->
