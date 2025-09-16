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

//STATIC IMAGE
if ($hero_type=='static_image') { ?>

  <?php if ($static_image) { ?>
  <section class="hero hero-<?php echo $hero_type ?>">
    <?php 
    $slideTitle = $static_title;
    $slideText = $static_description;
    $slideImage = $static_image;
    ?>
    <div class="static-hero">
      <?php if ($add_caption) { ?>
      
        <?php if ($slideTitle || $slideText) { ?>
        <div class="imageCaption">
          <div class="inside">
          <?php if ($slideTitle) { ?>
            <h2 class="title"><?php echo $slideTitle ?></h2>
          <?php } ?>
          <?php if ($slideText) { ?>
            <div class="text"><?php echo $slideText ?></div>
          <?php } ?>

            <?php if ($static_buttons) { ?>
            <div class="buttons">
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
      <figure class="image">
        <img src="<?php echo $slideImage['url'] ?>" role="presentation" alt="" class="image-desktop">
        <?php if ($static_image_mobile) { ?>
        <img src="<?php echo $static_image_mobile['url'] ?>" role="presentation" alt="" class="image-mobile">
        <?php } ?>
      </figure>
    </div>
  </section>
  <?php } ?>

  
<?php } ?>