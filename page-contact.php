<?php
/**
 * Template Name: Contact Page
 *
 */
get_header(); ?>

<div id="primary" class="content-area-full contact-page-content">
	<main id="main" class="site-main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="entry-content">
      <?php the_content() ?>
    </div>
  <?php endwhile; ?>
  </main>
</div><!-- #primary -->

<?php
get_footer();
