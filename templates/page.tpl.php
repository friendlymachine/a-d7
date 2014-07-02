<div id="page">

  <div class="header-wrapper">
    <header class="header grid-container" id="header" role="banner">
      <div class="branding-wrapper">
      <div class="region region-branding">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
        <?php endif; ?>

        <?php if ($site_name || $site_slogan): ?>
          <div class="header__name-and-slogan" id="name-and-slogan">
            <?php if ($site_name): ?>
              <h1 class="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><?php print $site_name; ?></a>
              </h1>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
              <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            <?php print render($page['branding']); ?>
      </div>
    </div>
    <div class="menu-wrapper">
       <?php if($main_menu): ?>
       <div class="region-menu">
        <a href="#menu" class="menu-link">Menu</a>
        <?php print drupal_render(menu_tree_output(menu_tree_all_data('main-menu'))); ?>
      </div>
     <?php endif; ?>
    </div>
    </header>
  </div>

  <div class="preface-wrapper">
    <div id="preface grid-container">
      <?php print render($page['preface']); ?>
    </div>
  </div>

  <div id="main" class="content-wrapper">
    <div id="content" class="column grid-container" role="main">
      <?php print render($page['highlighted']); ?>
      <a id="main-content"></a>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>

      <?php
        // Render the sidebars to see if there's anything in them.
        $sidebar_first  = render($page['sidebar_first']);
        $sidebar_second = render($page['sidebar_second']);
      ?>

      <?php if ($sidebar_first || $sidebar_second): ?>
          <?php print $sidebar_first; ?>
          <?php print $sidebar_second; ?>
      <?php endif; ?>
      <?php print $feed_icons; ?>
    </div>
  </div>
<footer class="grid-container">
  <?php print render($page['footer']); ?>
</footer>
</div>

<?php print render($page['bottom']); ?>
