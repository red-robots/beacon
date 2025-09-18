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
      <div class="image-wrapper">
        <div class="bg-image bg-desktop" style="background-image:url('<?php echo $slideImage['url'] ?>');"></div>
        
        <svg>
            <clipPath id="wave" clipPathUnits="objectBoundingBox">
              <!-- <path class="st0" d="M1,0c0,0-0.3,0.1-0.5,0.1S0.3,0,0,0.1V1h1L1,0z"/> -->
              <!-- <path class="st0" d="M0-296.3s194.6,232.2,487.4,85.1c446-224.1,693.3-33.4,901.5,51,250.1,101.4,531-136.2,531-136.2V865.4H0V-296.3Z"/> -->
              <!-- <path class="st0" d="M1920,754.5s-194.6-384-487.4-140.8c-446,370.5-693.3,55.3-901.5-84.4C280.9,361.6,0,754.5,0,754.5V-1426.6h1920V754.5Z"/> -->
              <path class="st0" d="M1920,2409.2s-194.6-481.6-487.4-176.6c-446,464.7-693.3,69.3-901.5-105.8C280.9,1916.5,0,2409.2,0,2409.2V0h1920v2409.2Z"/>
            </clipPath>
        </svg>
      </div>
    </div>
  </section>
  <?php } ?>

  
<?php } ?>