<?php 
$hero = get_field('hero_image');
$alt_page_title = get_field('alt_page_title');
$custom_page_title = ($alt_page_title) ? $alt_page_title : get_the_title();
$alt_page_content = get_field('alt_page_content');
if ($hero) { ?>
<section class="hero-about">
  <div class="hero-inside">
    <?php if ($custom_page_title) { ?>
    <div class="hero-title">
      <div class="wrapper">
        <div class="herowrap">
          <div class="titlewrap">
            <h1><?php echo $custom_page_title; ?></h1>
          </div>
          <div class="contentwrap"><?php echo $alt_page_content; ?></div>
        </div>
      </div>
    </div>
    <?php } ?>
    <figure class="hero-image">
      <div class="image" style="background-image:url(<?php echo $hero['url'] ?>)"></div>
    </figure>
  </div>
</section>
<?php } ?>