<?php
/**
 * Template Name: Patient Experience
 *
 */
get_header(); ?>
<div id="primary" class="content-area-full patient-experience-content">
	<main id="main" class="site-main" role="main">
    <div class="wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
      
    <?php endwhile; ?>
    </div>
  </main>
</div><!-- #primary -->
<?php
get_footer();
