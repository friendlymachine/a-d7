<div class="l-page atlas-3-col">
  <header class="l-header">
      <div class="l-top">
		    <?php if ($logo): ?>
          <div class="logo">
	          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
	        <?php endif; ?>
        </div>
  
        <?php if ($site_name || $site_slogan): ?>
          <div class="name-slogan">
	          <?php if ($site_name): ?>
	            <h1 class="site-name">
	              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
	            </h1>
	          <?php endif; ?>
	  
	          <?php if ($site_slogan): ?>
	            <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
	          <?php endif; ?>
          </div>
        <?php endif; ?>
		  </div>     
   </header> 
  
  <section class="l-preface">
    <?php print render($page['preface']); ?>
  </section>

  <div class="l-main">
    <?php print render($page['highlighted']); ?>
    <?php print $breadcrumb; ?>
    <a id="main-content"></a>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h1><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php print $messages; ?>
    <?php print render($tabs); ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>
    
    <div class="l-content" role="main">
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>
    
    <div class="l-sidebar-first">
      <?php print render($page['sidebar_first']); ?>
    </div> 
    <div class="l-sidebar-second">
      <?php print render($page['sidebar_second']); ?>
    </div> 
     
  </div>
  
<div class="footer-wrapper">  
  <footer class="l-footer" role="contentinfo">
    <?php print render($page['footer']); ?>
  </footer>
</div> 
 
</div>
