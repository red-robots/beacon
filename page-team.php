<?php
/**
 * Template Name: Team Page
 *
 *
 */
get_header(); ?>
<div id="primary" class="content-area-full team-page">
	<main id="main" class="site-main" role="main">
    <div class="wrapper">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content() ?>
            </div>
        <?php endwhile; ?>

      <?php
        $location = "";
        $page_landing_data = get_landing_page_data();

        // Get Location
        global $post; // Make sure the global $post object is available

        if($post && $post->post_parent){
          // Get the immediate parent page
          $parent_page = get_post($post->post_parent);

          if($parent_page) {
            $location = $parent_page->post_name;
          }
        }

        // Get all post matching the location
        $locationArg = array(
            'post_type' => 'team', // Replace with your custom post type slug
            'posts_per_page' => -1, // Retrieve all matching posts, or specify a number
            'tax_query' => array(
                array(
                    'taxonomy' => 'location-category', // Replace with your custom taxonomy slug
                    'field'    => 'slug', // Can be 'slug', 'term_id', or 'name'
                    'terms'    => $location, // Taxonomy term you want to filter by
                ),
            ),
        );
        $allTeams = new WP_Query( $locationArg );

        if( $allTeams->have_posts() ):
            echo '<div class="flexwrap">';

            while( $allTeams->have_posts() ) : 
              $allTeams->the_post();
                $post_id = get_the_ID();
                $post_url = get_permalink( $post_id );
                $team_name = get_the_title();
                $post_content = get_the_content();
                $job_title = get_field('job_title', $post_id);
                $team_img = get_field('photo', $post_id);
                $photo_placeholder = get_stylesheet_directory_uri() . '/images/photo-coming-soon.jpg';
        ?>
            <div class="popup-activity fxcol flexwrap" data-postid="<?php echo $post_id ?>">
                <figure class="photo">
                    <?php if ($team_img) { ?>
                        <img src="<?php echo $team_img['sizes']['medium_large'] ?>" alt="<?php echo $team_name; ?>" />
                    <?php } else { ?>
                        <img src="<?php echo $photo_placeholder ?>" alt="" />
                    <?php } ?>
                </figure>
                <?php if($team_name){ ?>
                    <div class="titleWrap">
                        <h3><?php echo $team_name; ?></h3>
                        <div class="jobTitle"><?php echo $job_title; ?></div>
                    </div>
                <?php } ?>
            </div>
        <?php
            wp_reset_postdata();
          endwhile;

          echo '</div>';
        endif;
      ?>

    </div>
  </main>
</div><!-- #primary -->
<?php
get_footer();
