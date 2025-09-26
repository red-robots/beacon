<?php if( get_row_layout() == 'layout3' ) {
  $text = get_sub_field('text_content');
  $images = get_sub_field('featured_images');
  $has_content = ($text || $images) ? true : false;
  $custom_class = ($ctr==1) ? ' first':'';
  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?><?php echo $custom_class ?>">
    <div class="wrapper">
      <div class="flexwrap">
        <?php if ($text) { ?>
        <div class="fxcol textCol">
          <?php echo anti_email_spam($text); ?>
        </div>
        <?php } ?>

        <?php if ($images) { ?>
        <div class="fxcol imageCol">
          <div class="images count-<?php echo count($images) ?>">
          <?php foreach ($images as $k=>$img) {
            $imgctr = $k+1; 
            $imgUrl = $img['url'];
            $imgTitle = $img['title'];
            $imgClass = ($k==0) ? ' first':'';
            $imgClass .= ' img' . $imgctr;
            if($imgUrl) { ?>
              <figure class="imgwrap<?php echo $imgClass ?>">
                <?php if ($imgctr==1) { ?>
                  <img src="<?php echo get_stylesheet_directory_uri() ?>/images/hexagon.png" alt="" aria-hidden="true" role="presentation" class="hexagon" style="pointer-events:none;">
                <?php } ?>

                <?php if ($imgctr==2) { ?>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/cloud.png" alt="" aria-hidden="true" role="presentation" class="cloud" style="pointer-events:none;">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/cloud2.png" alt="" aria-hidden="true" role="presentation" class="cloud2" style="pointer-events:none;">
                <?php } ?>
                <div class="inner">
                  <img src="<?php echo $imgUrl ?>" alt="<?php echo $imgTitle ?>">
                </div> 
              </figure>
            <?php } ?>
          <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>  
  </section>
  <?php } ?>
<?php } ?>