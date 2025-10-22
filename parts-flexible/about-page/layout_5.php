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
        foreach($section as $sec){
          print_r($sec);
        }
      ?>

      <?php } ?>

      <!-- <div class="flexwrap">
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
        <?php if ($text) { ?>
          <div class="fxcol textCol">
            <?php echo anti_email_spam($text); ?>
          </div>
        <?php } ?>
      </div> -->
    </div>  
  </section>
  <?php } ?>
<?php } ?>