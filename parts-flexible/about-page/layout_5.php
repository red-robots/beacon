<?php if( get_row_layout() == 'layout_5' ) {
  $story_title = get_sub_field('our_story_title');
  $section = get_sub_field('section');
  $has_content = ($story_title || $section) ? true : false;
  $custom_class = ($ctr==1) ? ' first':'';
  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?><?php echo $custom_class ?>">

    <div class="wrapper">
      <h2><?php echo $story_title; ?></h2>

      <?php if($section){
        $count = 1;

        foreach($section as $sec){
          $image_position = $sec['image_position'];
          $content = $sec['text_content'];
          $text_content = apply_filters('the_content', $content);
          $image = $sec['featured_image'];
          $imageUrl = $image['url'];
          $imageTitle = $image['title'];
          //print_r($sec);
      ?>
          <div class="flexwrap image-<?php echo $image_position; ?>">
            <?php if($imageUrl) { ?>
              <div class="fxcol imageCol image-<?php echo $count; ?>">
                <figure class="imgwrap">
                  <?php if ($count==1) { ?>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/story-image-1.png" alt="" aria-hidden="true" role="presentation" class="hexagon" style="pointer-events:none;">
                    <div class="inner">
                      <img src="<?php echo $imageUrl ?>" alt="<?php echo $imageTitle ?>">
                    </div> 
                  <?php } else { ?>
                    <!-- <img src="<?php echo get_stylesheet_directory_uri() ?>/images/story-image-2.png" alt="" aria-hidden="true" role="presentation" class="circle" style="pointer-events:none;"> -->
                    <img src="<?php echo $imageUrl ?>" alt="<?php echo $imageTitle ?>">
                  <?php } ?>
                </figure>
              </div>
            <?php } ?>
            <div class="fxcol textCol">
              <?php echo $text_content; ?>
            </div>
          </div>
      <?php
          $count++;
        }
      ?>

      <?php } ?>
    </div>  
  </section>
  <?php } ?>
<?php } ?>