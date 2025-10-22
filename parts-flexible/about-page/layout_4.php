<?php if( get_row_layout() == 'layout_4' ) {
  $section_title = get_sub_field('section_title');
  $more_info = get_sub_field('more_info');
  $has_content = ($section_title || $more_info) ? true : false;
  $custom_class = ($ctr==1) ? ' first':'';
  if ($has_content) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?><?php echo $custom_class ?>">
    <div class="wrapper">
      <?php if ($section_title) { ?>
      <div class="fxcol textCol">
        <div class="textWrap">
          <h2><?php echo anti_email_spam($section_title); ?></h2>
        </div>
      </div>
      <?php } ?>

      <?php if ($more_info) { ?>
      <div class="fxcol imageCol">
        <?php foreach($more_info as $info) {
          $icon = $info['icon']; 
          $icon_url = (isset($icon['url'])) ? $icon['url'] : '';

          $title = $info['title'];
          $content = $info['content'];

          if($icon && $title) { ?>
          <div class="ctaWrap">
            <div class="cta">
              <div class="icon-content">
                <figure class="imgwrap">
                  <img src="<?php echo $icon_url ?>" alt="<?php echo $icon['title'] ?>">
                </figure>
              </div>
              <div class="title"><?php echo anti_email_spam($title); ?></div>
              <div class="content"><?php echo anti_email_spam($content); ?></div>
            </div>
          </div>
          <?php } ?>
        <?php } ?>
      </div>
      <?php } ?>
    </div>  
  </section>
  <?php } ?>
<?php } ?>