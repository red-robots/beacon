<?php if( get_row_layout() == 'featured_image_and_icons' ) {
  $left = get_sub_field('left_column');
  $right = get_sub_field('right_column');
  $left_image = (isset($left['image']) && $left['image']) ? $left['image'] : '';
  $left_title = (isset($left['title']) && $left['title']) ? $left['title'] : '';
  $iconList = (isset($right['iconList']) && $right['iconList']) ? $right['iconList'] : '';
  $custom_class = ($ctr==1) ? ' first':'';
  $custom_class .= ( ($left_image || $left_title) && $iconList ) ? ' two-columns' : '';
  $has_content = ( ($left_image || $left_title) || $iconList ) ? true : false;
  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?><?php echo $custom_class; ?>">
    <div class="wrapper">
      <div class="flexwrap">
        <?php if ($left_image || $left_title) { ?>
        <div class="leftCol">
          <div class="inner">
            <?php if ($left_image) { ?>
            <figure>
              <div class="imagewrap">
                <img src="<?php echo $left_image['url'] ?>" alt="" />
              </div>
            </figure> 
            <?php } ?>
            <?php if ($left_title) { ?>
            <div class="imageText">
              <div class="text">
                <?php echo anti_email_spam($left_title); ?>
              </div>
            </div> 
            <?php } ?>
          </div>
        </div> 
        <?php } ?>
        <?php if ($iconList) { ?>
        <div class="rightCol">
          <ul class="iconList">
          <?php foreach ($iconList as $a) { 
            $icon = $a['icon'];
            $text = $a['text']; ?>
            <li>
              <?php if ($icon) { ?>
              <div class="icon-image">
                <span style="background-image:url('<?php echo $icon['url'] ?>')"></span>
              </div>  
              <?php } ?>

              <?php if ($text) { ?>
              <div class="text">
                <?php echo anti_email_spam($text); ?>
              </div>
              <?php } ?>
            </li>
          <?php } ?>
          </ul>
        </div> 
        <?php } ?>
      </div>
    </div>  
  </section>
  <?php } ?>
<?php } ?>