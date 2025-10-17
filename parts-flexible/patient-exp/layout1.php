<?php if( get_row_layout() == 'layout_1' ) {
  $icon = get_sub_field('icon');
  $intro = get_sub_field('intro');
  $introCols = get_sub_field('infocolumns');
  $has_content = ($icon || $intro) ? true : false;
  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?>">
    <div class="wrapper">
      <?php if ($intro) { ?>
        <?php if ($icon) { ?>
          <div class="imageCol">
            <?php
              $iconUrl = $icon['url'];
              $iconTitle = $icon['title'];
              if($iconUrl) { ?>
                <figure class="imgwrap">
                  <div class="inner">
                    <img src="<?php echo $iconUrl; ?>" alt="<?php echo $iconTitle ?>">
                  </div> 
                </figure>
              <?php } ?>
          </div>
        <?php } ?>
        <div class="textCol">
          <div class="textWrap">
            <?php echo anti_email_spam($intro); ?>
          </div>
        </div>
      <?php } ?>
      <?php if( $introCols ) { ?>
        <div class="flexwrap">
          <?php foreach( $introCols as $col ) {
            $colText = $col['text'];
            $gmap = $col['map_embed'];
            $borderColor = $col['border_color'];
          ?>
            <div class="col" style="background-color:<?php echo ($borderColor) ? $borderColor : 'transparent' ;?>">
              <div class="col-inner">
                <div class="address">
                  <?php echo anti_email_spam($colText); ?>
                </div>
                <div class="gmaps">
                  <div class="contact-map-embed"><?php echo $gmap; ?></div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </section>
  <?php } ?>
<?php } ?>