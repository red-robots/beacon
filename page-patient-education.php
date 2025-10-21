<?php
/**
 * Template Name: Patient Education
 *
 *
 */
get_header(); ?>
<div id="primary" class="content-area-full patient-education-content">
	<main id="main" class="site-main" role="main">
    <div class="wrapper">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php endwhile; ?>

      <?php
        $postListperResource = array();
        $location = "";

        // Get Location
        global $post; // Make sure the global $post object is available

        if($post && $post->post_parent){
          // Get the immediate parent page
          $parent_page = get_post($post->post_parent);
      
          if($parent_page && $parent_page->post_parent){
            // Get the parent of the immediate parent page
            $grandparent_page = get_post($parent_page->post_parent);
    
              if($grandparent_page) {
                $location = $grandparent_page->post_name;
              }
          }
        }

        // Get Resources category
        $args = array(
            'taxonomy' => 'resources-category',
            'orderby' => 'name',
            'order'   => 'ASC'
        );
        $resourcesCategories = get_categories($args);

        if( $resourcesCategories ){
          echo '<div class="flexwrap resource-filter">';
            echo '<div class="resource-filter-choice active" data-target="all">All</div>';

            foreach( $resourcesCategories as $resourcesCategory ) : 
        ?>
          <div class="resource-filter-choice" data-target=".<?=$resourcesCategory->slug?>">
            <?php echo $resourcesCategory->name; ?>
          </div>
        <?php
            endforeach;

          echo '</div>';
        }

        // Get all post matching the location
        $locationArgs = array(
          'post_type' => 'resources', // Replace with your custom post type slug
          'posts_per_page' => -1, // Retrieve all matching posts, or specify a number
          'tax_query' => array(
              array(
                  'taxonomy' => 'location-category', // Replace with your custom taxonomy slug
                  'field'    => 'slug', // Can be 'slug', 'term_id', or 'name'
                  'terms'    => $location, // Taxonomy term you want to filter by
              ),
            ),
        );
        $allPostInLocation = new WP_Query( $locationArgs );

        // Get all the taxonomies for this post type
        if( $resourcesCategories ){
          foreach( $resourcesCategories as $resourcesCategory ) : 
            // Gets every "category" (term) in this taxonomy to get the respective posts
            $resourceTerms = get_terms( $resourcesCategory );

            foreach( $resourceTerms as $resourceTerm ) :
              echo '<div class="resource-container '. $resourceTerm->slug .'">'; // start resource container
                $termIcon = get_field('taxonomy_icon', $resourceTerm);

                if($termIcon){ ?>
                  <div class="resource-icon">
                    <figure>
                      <img src="<?php echo $termIcon['url']; ?>" alt="<?php echo $termIcon['title']; ?>">
                    </figure>
                  </div>
                <?php }

                echo '<h2 class="term-title">'. $resourceTerm->name .'</h2>';
                echo '<div class="flexwrap">';

                $locationArgs = array(
                  'post_type' => 'resources', // Replace with your custom post type slug
                  'posts_per_page' => -1, // Retrieve all matching posts, or specify a number
                  'tax_query' => array(
                      array(
                          'taxonomy' => 'resources-category', // Replace with your custom taxonomy slug
                          'field'    => 'slug', // Can be 'slug', 'term_id', or 'name'
                          'terms'    => $resourceTerm->slug, // Taxonomy term you want to filter by
                      ),
                      array(
                        'taxonomy' => 'location-category', // Replace with your custom taxonomy slug
                        'field'    => 'slug', // Can be 'slug', 'term_id', or 'name'
                        'terms'    => $location, // Taxonomy term you want to filter by
                      ),
                    ),
                );
                $allPostInLocation = new WP_Query( $locationArgs );

                if( $allPostInLocation->have_posts() ):
                  while( $allPostInLocation->have_posts() ) : 
                    $allPostInLocation->the_post();
                    $post_id = get_the_ID();
                    $post_url = get_permalink( $post_id );
                    $post_content = get_the_content();
                    $post_excerpt = get_field('excerpt_shorten', $post_id);
              ?>
                  <div class="fxcol resource-item">
                    <h3><?php the_title(); ?></h3>
                    <?php if( $post_content || $post_excerpt ){ ?>
                      <div class="resource-content">
                        <?php 
                          if( !empty($post_excerpt) ){
                            echo $post_excerpt;
                          } else {
                            echo wp_trim_words( $post_content, 22 );
                          }
                        ?>
                      </div>
                    <?php } ?>
                    <a href="<?php echo $post_url; ?>?location=<?php echo $location; ?>">Read more <span class="arrow"></span></a>
                  </div>
              <?php
                  wp_reset_postdata();
                endwhile;
              endif;

              echo '</div>';

            echo '</div>'; // end resource container
            endforeach;

          endforeach;
        }
      ?>

    </div>
  </main>
</div><!-- #primary -->
<?php
get_footer();
