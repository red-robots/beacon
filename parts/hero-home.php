<?php 
//$hero_type = get_field('hero_type');
$hero_type = 'static_image';
$static = get_field('static_image_block');
$add_caption = (isset($static['add_caption'])) ? $static['add_caption'] : '';
$static_image = (isset($static['static_image'])) ? $static['static_image'] : '';
$static_image_mobile = (isset($static['static_image_mobile'])) ? $static['static_image_mobile'] : '';
$static_title = (isset($static['title'])) ? $static['title'] : '';
$static_description = (isset($static['description'])) ? $static['description'] : '';
$static_buttons = (isset($static['buttons'])) ? $static['buttons'] : '';
$sliderImages = get_field('slider');
if($static_image) { ?>
<section class="hero" role="banner" aria-label="Main promotional banner">
  <div class="hero_inner_content">
    <svg width="0" height="0" style="position:absolute" aria-hidden="true"><defs><clipPath id="wavePath" clipPathUnits="objectBoundingBox"><path d="M0,0h1919.1v949.1s-55.9,24.5-118,22.9c-115.4-3-182-36.9-331-49.9-56.5-3.8-139.3,2.7-198,15.9-96.2,22.2-193.5,48.1-314,37.1-135.6-10.6-172.2-50.3-332.1-49.1-187.2,1.4-349.2,48.2-466.9,49.1C56.1,977.6,0,932,0,932V0Z" transform="scale(0.00054, 0.00102)" /></clipPath></defs></svg>
    <div class="hero__media" aria-hidden="true">
      <img src="<?php echo $static_image['url'] ?>" alt="" /> 
    </div>
    <?php if ($add_caption) { ?>
      <?php if ($static_title || $static_description) { ?>
      <div class="hero__content">
        <div class="hero__inner">
          <?php if ($static_title) { ?>
          <div class="hero__title"><?php echo anti_email_spam($static_title); ?></div>
          <?php } ?>
          <?php if ($static_description) { ?>
          <div class="hero__subtitle"><?php echo anti_email_spam($static_description); ?></div>
          <?php } ?>

          <?php if ($static_buttons) { ?>
          <div class="hero__buttons">
            <?php foreach ($static_buttons as $b) { 
              $button = $b['button_name'];
              if($button) { ?>
                <?php echo anti_email_spam($button); ?>
              <?php } ?>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
    <?php } ?>
  </div>
  <div class="bottom-wave"></div>
  <!-- <img src="<?php //echo get_stylesheet_directory_uri() ?>/images/wave.png" class="bottom-wave" role="presentation" aria-hidden="true" alt=""> -->
</section>
<?php } ?>