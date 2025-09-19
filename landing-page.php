<?php
/**
 * Template Name: Landing Page
 *
 */
get_header(); ?>

<div id="primary" class="content-area-full generic-layout">
	<main id="main" class="site-main" role="main">
  <?php if( have_rows('flexible_content') ) { ?>
    <?php include( locate_template('parts/content-flexible.php') ); ?>
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
