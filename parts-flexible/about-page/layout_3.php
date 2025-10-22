<?php if( get_row_layout() == 'layout_3' ) {
  $section_intro = get_sub_field('section_intro');
  $icon = get_sub_field('icon');
  $cta = get_sub_field('call_to_action_content');

  $custom_class = ($ctr==1) ? ' first':'';
  $custom_class .= ( ($section_intro || $icon) && $cta ) ? ' two-columns' : '';
  $has_content = ( ($section_intro || $icon) || $cta ) ? true : false;

  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?><?php echo $custom_class; ?>">
    <div class="flexwrap">
      <?php if ($section_intro) { ?>
      <div class="fxcol leftCol">
        <div class="inner">
          <div class="imageText">
            <div class="text">
              <?php echo anti_email_spam($section_intro); ?>
            </div>
          </div> 
        </div>
      </div> 
      <?php } ?>
      <?php if ($cta || $icon) { ?>
      <div class="fxcol rightCol">
        <div>
          <div class="icon-image">
            <figure>
                <img src="<?php echo $icon['url'] ?>" alt="" />
            </figure> 
          </div>  
          <div class="text">
            <?php echo anti_email_spam($cta); ?>
          </div>
        </div>
      </div> 
      <?php } ?>
    </div>
  </section>
  <?php } ?>
<?php } ?>