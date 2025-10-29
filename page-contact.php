<?php
/**
 * Template Name: Contact Page
 *
 */
get_header(); ?>

<div id="primary" class="content-area-full contact-page-content">
	<main id="main" class="site-main" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="midcontent wrapper">
      <div class="inner-content">
        <?php  
          $title = get_field('title');
          $details = get_field('contact_details');
          $address = (isset($details['address']) && $details['address']) ? $details['address'] : '';
          $phone = (isset($details['phone']) && $details['phone']) ? $details['phone'] : '';
          $map = (isset($details['map']) && $details['map']) ? $details['map'] : '';
          $hours = (isset($details['hours']) && $details['hours']) ? $details['hours'] : '';
        ?>
        <div class="infoCol detailCol">
          <?php if ($title) { ?>
          <h2 class="h2"><span><?php echo $title ?></span></h2> 
          <?php } ?>
          <?php
            if( have_rows('manager_contact') ):
              while( have_rows('manager_contact') ): the_row(); 
                $image = get_sub_field('manager_image');
                $name = get_sub_field('manager_name');
                $job_title = get_sub_field('job_title');
              ?>
                <div class="staff-info">
                  <?php if ($image) { ?>
                    <figure class="photo">
                      <img src="<?php echo $image['sizes']['medium'] ?>" alt="" />                
                    </figure>
                  <?php } ?>
                  <div class="info">
                    <?php if ($job_title) { ?>
                    <h3 class="h3 jobtitle"><?php echo $job_title ?></h3>
                    <?php } ?>
                    <div class="name"><?php echo $name ?></div>
                  </div>
                </div>
              <?php
                endwhile;
            endif;
          ?>
            <div class="info-row">

              <div class="group">
                <?php if($address) { ?>
                <div class="info flex address">
                  <span class="icon -map"></span>
                  <span class="text"><?php echo $address ?></span>
                </div>
                <?php } ?>

                <?php if($phone) { ?>
                <div class="info flex phone">
                  <span class="icon -phone"></span>
                  <span class="text"><?php echo $phone ?></span>
                </div>
                <?php } ?>
              </div>

              <?php if($hours) { ?>
              <div class="info flex hours">
                <span class="icon -hours"></span>
                <span class="text">
                  <?php foreach ($hours as $h) { 
                    $h_title = $h['title'];
                    $h_schedules= $h['schedules'];
                    if($h_title || $h_schedules) { ?>
                      <div class="sched">
                        <?php if($h_title) { ?>
                        <h3 class="h3"><?php echo $h_title ?></h3>
                        <?php } ?>
                        <?php if($h_schedules) { ?>
                        <div class="schedules">
                          <?php foreach ($h_schedules as $s) { 
                            $days = $s['days'];
                            $times = $s['times'];
                            ?>
                            <?php if($days) { ?>
                            <div class="days"><strong><?php echo $days ?></strong></div>
                            <?php } ?>
                            <?php if($times) { ?>
                            <div class="times"><?php echo $times ?></div>
                            <?php } ?>
                          <?php } ?>
                        </div>
                        <?php } ?>
                      </div>
                    <?php } ?>
                  <?php } ?>
                </span>
              </div>
              <?php } ?>
            </div>
          </div>

        <?php if($map) { ?>
        <div class="infoCol mapCol">
          <div class="mapdiv"><?php echo $map ?></div>
        </div>
        <?php } ?>
      </div>
    </div>
  <?php endwhile; ?>
  </main>
</div><!-- #primary -->

<?php
get_footer();
