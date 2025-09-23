<?php
/**
 * Template Name: Landing Page
 *
 */
get_header(); ?>

<div id="primary" class="content-area-full generic-layout">
	<main id="main" class="site-main" role="main">
  <?php if( have_rows('flexible_content') ) { ?>
    
    <?php $ctr=1; while( have_rows('flexible_content') ): the_row(); ?>
      
      <?php include( locate_template('parts-flexible/landing-page/layout1.php') ); ?>
      <?php //include( locate_template('parts/home-layout2.php') ); ?>
    
    <?php $ctr++; endwhile; ?>

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
