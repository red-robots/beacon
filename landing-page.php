<?php
/**
 * Template Name: Landing Page
 *
 */
get_header(); ?>

<div id="primary" class="content-area-full generic-layout">
	<main id="main" class="site-main" role="main">
  <?php if( have_rows('flexible_content') ) { ?>
    <?php $ctr=1; while( have_rows('flexible_content') ): the_row(); 
    $templates = get_flexible_templates('landing-page');
    if($templates) {
      foreach($templates as $template) {
        include( locate_template($template) ); 
      }
    }
    $ctr++; endwhile; ?>
  <?php } else { ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="entry-content">
        <?php the_content() ?>
      </div>
    <?php endwhile; ?>
  <?php } ?>
</main>
</div><!-- #primary -->

<?php
get_footer();
