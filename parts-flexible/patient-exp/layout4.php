<?php if( get_row_layout() == 'layout_4' ) {
  $text = get_sub_field('text');
  $bgColor = get_sub_field('backgroundcolor');
  $textColor = get_sub_field('textcolor');

  if ($text) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?>" style="background-color:<?php echo ($bgColor) ? $bgColor : 'transparent' ;?>">
    <div class="wrapper">
        <div class="flexwrap">
            <div class="textCol">
              <div class="textWrap" style="<?php echo ($textColor) ? 'color:'.$textColor : 'color:inherit'; ?>">
                <?php echo anti_email_spam($text); ?>
              </div>
            </div>
        </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>