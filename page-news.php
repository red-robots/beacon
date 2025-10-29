<?php
/**
 * Template Name: News Page
 */

get_header(); 
$filter_category = ( isset($_GET['category']) && $_GET['category'] ) ? $_GET['category'] : '';
$perpage = -1;
$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
$currentPageLink = get_permalink();
if($filter_category) {
  $currentPageLink = get_permalink() . '?category=' . $filter_category;
}

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
$postArgs = array(
    'post_type' => 'post', // Replace with your custom post type slug
    'posts_per_page' => -1, // Retrieve all matching posts, or specify a number
    'tax_query' => array(
        array(
            'taxonomy' => 'location-category', // Replace with your custom taxonomy slug
            'field'    => 'slug', // Can be 'slug', 'term_id', or 'name'
            'terms'    => $location, // Taxonomy term you want to filter by
        ),
    ),
);
$entries = new WP_Query($postArgs);
?>

<div id="primary" class="content-area news-content">
  <main id="main" class="site-main" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php if ( get_the_content() ) { ?>
      <div class="entry-content">
        <div class="wrapper"><?php the_content(); ?></div>
      </div>
      <?php } ?>
    <?php endwhile; ?>  

    <?php if ( $entries->have_posts() ) { ?>
      <section id="entries" class="gallery-list">
        <div class="wrapper grid-items-wrapper">
          <div class="flexwrap masonry grid">
            <?php while ( $entries->have_posts() ) : $entries->the_post(); 
              $imageUrl = get_the_post_thumbnail_url( get_the_ID() );
              $content = get_the_content();
              $excerpt = ($content) ? shortenText(strip_tags($content), 250, ' ', '.') : '';
              if(empty($imageUrl)) {
                $excerpt = ($content) ? shortenText(strip_tags($content), 300, ' ', '.') : '';
              }
              ?>
              <div class="fbox grid-item">
                  <a href="<?php echo get_permalink() ?>?location=<?php echo $location; ?>" class="imageLink articleLink">
                    <?php if ($imageUrl) { ?>
                      <figure class="the-image <?php echo ($imageUrl) ? 'has-image':'no-image' ?>">
                        <img src="<?php echo $imageUrl ?>" alt="" />
                      </figure>
                    <?php } ?>
                    <figcaption>
                      <h3 class="title"><?php echo get_the_title() ?></h3>
                      <?php if ($excerpt) { ?>
                        <div class="excerpt"><?php echo $excerpt ?></div>
                      <?php } ?>
                      <span class="read-more">Read More <span class="arrow"></span></span>
                    </figcaption>
                  </a>
                
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>

        <div id="stophere"></div>

        <?php
          $total_pages = $entries->max_num_pages;
          if ($total_pages > 1){ ?> 
          <div class="load-more-wrap">
            <button id="load-more-btn" data-current="1" data-baseurl="<?php echo $currentPageLink ?>" data-end="<?php echo $total_pages?>" class="button"><span>Load More</span></button>
          </div>
          <?php } ?>
        <?php } ?>
      </section>
      <div class="hidden-entries" style="display:none;"></div>

  </main>
</div>


<script type="text/javascript">
// jQuery(document).ready(function($){

//   const $masonry = $('.masonry');
//   $masonry.imagesLoaded(function() {
//     $masonry.masonry({
//       itemSelector: '.grid-item',
//       //columnWidth: '.grid-sizer',
//       gutter: 30,
//       percentPosition: true,
//       stagger: 20,
//       visibleStyle: { opacity: 1 },
//       hiddenStyle: { opacity: 0 },  
//     });
//   });


//   $(document).on("click","#load-more-btn",function(e){
//     e.preventDefault();
//     var button = $(this);
//     var baseURL = $(this).attr("data-baseurl");
//     var currentPageNum = $(this).attr("data-current");
//     var nextPageNum = parseInt(currentPageNum) + 1;
//     var pageEnd = $(this).attr("data-end");
//     var nextURL = baseURL + '?pg=' + nextPageNum;
//     if(baseURL.indexOf('?')!==-1) {
//       nextURL = baseURL + '&pg=' + nextPageNum;
//     }

//     button.attr("data-current",nextPageNum);
//     if(nextPageNum==pageEnd) {
//       $(".load-more-wrap").remove();
//     }

//     $.get(nextURL, function( content ) {
//       var newItems = $(content).find('.grid-item');
//       if(newItems.length) {
//         $masonry.append(newItems);
//         $masonry.masonry( 'appended', newItems );
//         $masonry.imagesLoaded(function() {
//           setTimeout(function(){
//             $masonry.masonry('layout');
//           }, 400);
//         });
//       }
//     });

//   });

//   function smoothScroll(hashTag) {
//     var target = $(hashTag);
//     if (target.length) {
//       $('html, body').animate({
//         scrollTop: target.offset().top - 50
//       }, 1500, function() {
//         target.focus();
//         if (target.is(":focus")) {
//           return false;
//         } else {
//           target.attr('tabindex','-1');
//           target.focus(); 
//         };
//       });
//     }
//   }
// });
</script>
<?php
get_footer();
