	</div><!-- #content -->

  <?php  
  $page_template = ( get_page_template_slug() ) ? str_replace('.php','',get_page_template_slug()) : '';

  ?>

  <?php if ( !is_front_page() && !is_home() ) { 
    if ( $page_template=='landing-page' && ( is_single() || is_page() ) ) { 
      $foot = get_field('footer', get_the_ID() );
      $footer_logo = ( isset($foot['footer_logo_image']) && $foot['footer_logo_image'] ) ? $foot['footer_logo_image'] : '';
      $hours = ( isset($foot['hours_data']) && $foot['hours_data'] ) ? $foot['hours_data'] : '';
      $address = ( isset($foot['address_data']) && $foot['address_data'] ) ? $foot['address_data'] : '';
      $contact = ( isset($foot['contact_details']) && $foot['contact_details'] ) ? $foot['contact_details'] : '';
      $social_media = ( isset($foot['social_media']) && $foot['social_media'] ) ? $foot['social_media'] : '';
    ?>
  	<footer id="colophon" class="site-footer" role="contentinfo">
      <div class="footer-inner">
        <div class="wrapper">
          <div class="flexwrap">
            <?php if ($footer_logo) { ?>
            <div class="footCol info--logo">
              <img src="<?php echo $footer_logo['url'] ?>" alt="">
            </div>
            <?php } ?>

            <?php if ($hours) { ?>
            <div class="footCol info--hours">
              <div class="inside">
                <div class="infoTitle">Hours</div>
                <div class="infoText">
                  <?php foreach ($hours as $h) { 
                    if( $hours_details = $h['hours_details'] ) { ?>
                    <div class="hour-info">
                      <?php echo anti_email_spam($hours_details); ?>
                    </div>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php if ($address) { ?>
            <div class="footCol info--address">
              <div class="inside">
                <div class="infoTitle">Address</div>
                <div class="infoText">
                  <?php foreach ($address as $a) { 
                    if( $address_details = $a['address_details'] ) { ?>
                    <div class="address-info">
                      <?php echo anti_email_spam($address_details); ?>
                    </div>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>


            <?php if ($contact || $social_media) { ?>
            <div class="footCol info--contact">
              <div class="inside">

                <?php if ($contact) { ?>
                <div class="wrap contact-content">
                  <div class="infoTitle">Contact Us</div>
                  <div class="infoText">
                    <div class="contact-info">
                      <?php echo anti_email_spam($contact); ?>
                    </div>
                  </div>
                </div>
                <?php } ?>

                <?php if ($social_media) { ?>
                <div class="wrap social-media-links">
                  <div class="infoTitle">Follow Us</div>
                  <div class="infoText">
                    <div class="social-media">
                    <?php foreach ($social_media as $s) { 
                      $link = $s['link'];
                      $icon = $s['icon'];
                      $host = '';
                      if($link) {
                        $parts = parse_url($link);
                        $host = $parts['host'];
                        $host = str_replace('www.','',$host);
                        $host = str_replace('.com','',$host);
                        $host = ucwords($host);
                      }

                      if($link && $icon) { ?>
                      <a href="<?php echo $link ?>" target="_blank" class="social-item">
                        <?php echo $icon ?>
                        <span class="sr-only">Visit our <?php echo $host ?> page</span>
                      </a>
                      <?php } ?>
                    <?php } ?>
                    </div>
                  </div>
                </div>
                <?php } ?>

              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
  	</footer>
    <?php } ?>
  <?php } ?>
	
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
