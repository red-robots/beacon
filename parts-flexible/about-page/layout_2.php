<?php if( get_row_layout() == 'layout_2' ) {
  $text = get_sub_field('text_content');
  $image = get_sub_field('image');
  $has_content = ($text || $image) ? true : false;
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
        
        <?php if ($image) { ?>
          <div class="fxcol imageCol">
            <div class="images">
              <figure class="imgwrap first">
                <div class="inner">
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                </div> 
              </figure>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>  
  </section>
  <?php } ?>
<?php } ?>