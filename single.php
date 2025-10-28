<?php
/**
 * The template for displaying all pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

$placeholder = THEMEURI . 'images/rectangle.png';
global $post;

get_header('resources');
?>

<div id="primary" class="content-area-full content-default page-default-template">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); 
      $fullwidthContent = get_field('fullwidth_content');
    ?>
      <div class="wrapper back-wrapper">
        <a href="<?php echo wp_get_referer(); ?>" class="back-post"><span class="back-arrow"></span> Back to all posts</a>
      </div>
      <div class="wrapper hero-wrapper">
        <div class="hero flexwrap">
          <div class="date"><?php echo get_the_date('F j, Y'); ?></div>
          <div class="fxcol textCol">
            <h1 class="page-title"><?php the_title(); ?></h1>
          </div>
          <?php if ( has_post_thumbnail() ) { ?>
            <div class="fxcol imageCol">
              <figure class="imgwrap">
                  <img src="<?php echo get_stylesheet_directory_uri() ?>/images/story-image-1.png" alt="" aria-hidden="true" role="presentation" class="hexagon" style="pointer-events:none;">
                <div class="inner">
                  <?php the_post_thumbnail(); ?>
                </div> 
              </figure>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="wrapper">
        <div class="entry-content">
          <article>
            <?php the_content(); ?>
          </article>
        </div>
      </div>
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer('resources');
