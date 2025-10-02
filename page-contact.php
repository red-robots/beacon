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
        $staff = get_field('manager');
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
          <?php if($staff) { 
            $staffName = $staff->post_title;
            $staffPhoto = get_field('photo', $staff->ID);
            $staffJobTitle = get_field('job_title', $staff->ID);
            ?>
            <div class="staff-info">
              <?php if ($staffPhoto) { ?>
              <figure class="photo">
                <img src="<?php echo $staffPhoto['url'] ?>" alt="" />
              </figure>    
              <?php } ?>
              <div class="info">
                <?php if ($staffJobTitle) { ?>
                <h3 class="h3 jobtitle"><?php echo $staffJobTitle ?></h3>
                <?php } ?>
                <div class="name"><?php echo $staffName ?></div>
              </div>
            </div>
            <?php } ?>

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
