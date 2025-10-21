<?php 
$hero = get_field('hero_image', 'options');
$alt_page_title = get_field('alt_page_title', 'options');
$custom_page_title = ($alt_page_title) ? $alt_page_title : get_the_title();
if ($hero) { ?>
<section class="hero-internal">
  <div class="hero-inside">
    <?php if ($custom_page_title) { ?>
    <div class="hero-title">
      <div class="wrapper">
        <div class="titlewrap">
          <h1><span><?php echo $custom_page_title ?></span></h1>
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