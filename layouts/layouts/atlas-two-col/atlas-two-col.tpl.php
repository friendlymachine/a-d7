<div class="atlas-two-col">
  <section class="panel-main">
    <?php if ($content['left']): ?>
    	  <section class="panel-left">
    	    <?php print $content['left']; ?>
    	  </section>
      <?php else: ?>
    <?php endif; ?>
      <?php if ($content['right']): ?>
        <section class="panel-right">
          <?php print $content['right']; ?>
        </section>
      <?php else: ?>
      <?php endif; ?>
	</section>
</div>
