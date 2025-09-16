<?php if( get_row_layout() == 'layout2' ) {
  $text = get_sub_field('text_content');
  $images = get_sub_field('images');
  $has_content = ($text || $images) ? true : false;
  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?>">
    <div class="wrapper">
      <div class="flexwrap">
        <?php if ($text) { ?>
        <div class="fxcol textCol">
          <div class="wrap">
            <?php echo anti_email_spam($text); ?>
          </div>
        </div>
        <?php } ?>

        <?php if ($images) { $total_images = count($images); ?>
        <div class="fxcol imageCol">
          <div class="images count-<?php echo $total_images ?>">
            <?php if ($total_images>1) { ?>
              
              <?php foreach ($images as $k=>$img) { ?>
                <?php if ($k==0) { ?>
                <div class="group first">
                  <figure>
                    <span class="inner">
                      <span><img src="<?php echo $img['url'] ?>" alt="" role="presentation"></span>
                    </span>
                  </figure>
                </div> 
                <div class="group second">
                <?php } else { ?>
                  <figure>
                    <span class="inner">
                      <span><img src="<?php echo $img['url'] ?>" alt="" role="presentation"></span>
                    </span>
                  </figure>
                <?php } ?>
              <?php } ?>
                </div>

            <?php } else { ?>
              <?php foreach ($images as $img) { ?>
                <figure>
                  <span class="inner">
                    <img src="<?php echo $img['url'] ?>" alt="" role="presentation">
                  </span>
                </figure>
              <?php } ?>
            <?php } ?>
          
          </div>
        </div>
        <?php } ?>

        <div class="backgroundColor">
          <span class="stripe"></span>
        </div>
      </div>
    </div>  
  </section>
  <?php } ?>
<?php } ?>