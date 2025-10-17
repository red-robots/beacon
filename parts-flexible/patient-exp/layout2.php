<?php if( get_row_layout() == 'layout_2' ) {
  $left_icon = get_sub_field('icon');
  $left_content = get_sub_field('text');
  $bgColor_1 = get_sub_field('backgroundcolor_column1');
  $textColor_1 = get_sub_field('textcolor_column1');
  $right_icons = get_sub_field('list_icons');
  $bgColor_2 = get_sub_field('backgroundcolor_column2');
  $textColor_2 = get_sub_field('textcolor_column2');
  $custom_class = ($ctr==1) ? ' first':'';
  $custom_class .= ( ($left_icon || $left_content) && $right_icons ) ? ' two-columns' : '';
  $has_content = ( ($left_icon || $left_content) || $right_icons ) ? true : false;

  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?><?php echo $custom_class; ?>">
    <div class="flexwrap">
      <?php if ($left_icon || $left_content) { ?>
      <div class="fxcol leftCol" style="background-color:<?php echo ($bgColor_1) ? $bgColor_1 : 'transparent' ;?>">
        <div class="inner">
          <?php if ($left_icon) { ?>
          <figure>
            <div class="imagewrap">
              <img src="<?php echo $left_icon['url'] ?>" alt="" />
            </div>
          </figure> 
          <?php } ?>
          <?php if ($left_content) { ?>
          <div class="imageText">
            <div class="text" style="<?php echo ($textColor_1) ? 'color:'.$textColor_1 : 'color:inherit'; ?>">
              <?php echo anti_email_spam($left_content); ?>
            </div>
          </div> 
          <?php } ?>
        </div>
      </div> 
      <?php } ?>
      <?php if ($right_icons) { ?>
      <div class="fxcol rightCol" style="background-color:<?php echo ($bgColor_2) ? $bgColor_2 : 'transparent' ;?>">
        <ul class="iconList">
        <?php
        //print_r($right_icons);
        foreach ($right_icons as $icon) { 
          $image = $icon['icon'];
          $text = $icon['text']; ?>
          <li>
            <?php if ($image) { ?>
            <div class="icon-image">
              <span style="background-image:url('<?php echo $image['url'] ?>')"></span>
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
  </section>
  <?php } ?>
<?php } ?>