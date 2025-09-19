<?php
get_header(); 
?>
<main id="main" class="site-main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php  
    $locations = get_field('locations');
    $section_title = get_field('section_title');
    $more_button = get_field('more_button_title');
    $more_button_title = ($more_button) ? $more_button : 'More Information';
    if($locations) { ?>
    <div class="columns-locations">
      <div class="wrapper">
        <?php if ($section_title) { ?>
        <div class="section-title">
          <h2><?php echo $section_title ?></h2>
        </div>
        <?php } ?>
        <div class="flexwrap">
        <?php foreach ($locations as $a) { 
          if($loc = $a['location']) {
            $locId = $loc->ID;
            $locationName = $loc->post_title;
            $locationLink = get_permalink($locId);
            $contact_details = get_field('contact_details', $locId);
            //$image = $a['featured_image'];
            $image = get_field('thumbnail_image', $locId);
            $logo = get_field('location_logo', $locId);
            ?>
            <div class="infoBox">
              <div class="inside">
                <?php if ($logo) { ?>
                <div class="logo">
                  <a href="<?php echo $locationLink ?>" class="logo-image" style="background-image:url('<?php echo $logo['url'] ?>')"><span class="sr-only"><?php echo $locationName ?></span></a>
                </div>
                <?php } ?>
                <?php if ($image) { ?>
                <figure>
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" />
                </figure>
                <?php } ?>
                <div class="details">
                  <h3 class="name"><?php echo $locationName ?></h3>
                  <?php if ($contact_details) { ?>
                  <div class="contact-info"><?php echo anti_email_spam($contact_details); ?></div>
                  <?php } ?>
                  <?php if ($more_button_title) { ?>
                  <div class="button-wrap">
                    <a href="<?php echo $locationLink ?>" class="button"><?php echo $more_button_title ?></a>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?> 
  <?php endwhile; ?>
</main>

<?php
get_footer();
