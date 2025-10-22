<?php
/**
 * Template Name: About
 *
 */
get_header(); ?>
<div id="primary" class="content-area-full about-page-content">
	<main id="main" class="site-main" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php endwhile; ?>
    <?php if( have_rows('flexible_content') ) {  ?>
      <div class="flexible-content-wrapper">
        <?php $ctr=1; while( have_rows('flexible_content') ): the_row();
          $templates = get_flexible_templates('about-page');

          if($templates) {
            foreach($templates as $template) {
              include( locate_template($template) );
            }
          }

          $ctr++; endwhile;
        ?>
      </div>
    <?php } ?>
  </main>
</div><!-- #primary -->
<?php
get_footer();
