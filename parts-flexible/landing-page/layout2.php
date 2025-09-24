<?php if( get_row_layout() == 'layout2' ) {
  $text = get_sub_field('section_intro');
  $ctas = get_sub_field('ctas');
  $has_content = ($text || $ctas) ? true : false;
  $custom_class = ($ctr==1) ? ' first':'';
  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?><?php echo $custom_class ?>">
    <div class="wrapper">
      <?php if ($text) { ?>
      <div class="fxcol textCol">
        <div class="textWrap">
          <?php echo anti_email_spam($text); ?>
        </div>
      </div>
      <?php } ?>

      <?php if ($images) { ?>
      <div class="fxcol imageCol">
        <div class="images">
        <?php foreach($ctas as $k=>$c) {
          $icon = $c['icon']; 
          $link = $c['link']; 
          $imgUrl = (isset($icon['url'])) ? $icon['url'] : '';
          
          $iconName = (isset($link['title'])) ? $link['title'] : '';
          $iconLink = (isset($link['url'])) ? $link['url'] : '';
          $iconTarget = (isset($link['target'])) ? $link['target'] : '_self';
          $imgClass = ($k==0) ? ' first':'';

          if($imgUrl) { ?>
          <div class="ctaWrap">
            <?php if ($iconName && $iconLink) { ?>
              <a href="<?php echo $iconLink ?>" class="cta" target="<?php echo $iconTarget ?>">
                <div class="icon-content">
                  <figure class="imgwrap<?php echo $imgClass ?>">
                    <img src="<?php echo $imgUrl ?>" alt="<?php echo $icon['title'] ?>">
                  </figure>
                  <span class="name"><span><?php echo $iconName ?></span><i aria-hidden="true" class="arrow"></i></span>
                </div>
                <span class="bgcolor"></span>
                <span class="hover"></span>
              </a>
            <?php } else { ?>
              <div class="cta">
                <div class="icon-content">
                  <figure class="imgwrap<?php echo $imgClass ?>">
                    <img src="<?php echo $imgUrl ?>" alt="<?php echo $icon['title'] ?>">
                  </figure>
                  <span class="bgcolor"></span>
                </div>
              </div>
            <?php } ?>
          </div>
          <?php } ?>
        <?php } ?>
        </div>
      </div>
      <?php } ?>
    </div>  
  </section>
  <?php } ?>
<?php } ?>