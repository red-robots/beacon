	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footerTop">
      <div class="wrapper">
        <div class="flexwrap">
          <?php $portal = get_field('portal_links','option'); ?>
          <?php if ($portal) { ?>
           <?php foreach ($portal as $p) { 
              $title = $p['title'];
              $login_title = $p['login_title'];
              $link = $p['url'];
              $target = ($p['target']) ? ' target="_blank"':'';
              if($title && $link) { ?>
              <div class="portal-link">
                <a href="<?php echo $link ?>"<?php echo $target ?>>
                  <span class="inside">
                    <span class="title"><?php echo $title ?></span>
                    <?php if ($login_title) { ?>
                    <span class="icon-text"><i class="fa-solid fa-circle-user"></i> <?php echo $login_title ?></span>
                    <?php } ?>
                  </span>
                </a>
              </div>
              <?php } ?> 
            <?php } ?> 
          <?php } ?>
        </div>
      </div>
    </div>

    <?php 
      $footer_logo = get_field('footer_logo','option'); 
      $office_email = get_field('office_email','option'); 
      $office_address = get_field('office_address','option'); 
      $office_phone = get_field('office_phone','option'); 
    ?>

    <div class="footerBottom">
      <div class="wrapper">
        <?php if ($footer_logo) { ?>
        <figure class="footer-logo">
          <img src="<?php echo $footer_logo['url'] ?>" alt="" />
        </figure>  
        <?php } ?>

        <div class="office-details">
          <?php if ($office_email) { ?>
          <span class="info email">
            <a href="mailto:<?php echo antispambot($office_email,true) ?>"><i class="fa-sharp fa-solid fa-envelope"></i> <?php echo antispambot($office_email) ?></a>
          </span>
          <?php } ?>

          <?php if ($office_address) { ?>
          <span class="info address">
            <i class="fa-sharp fa-solid fa-location-dot"></i> <?php echo $office_address ?>
          </span>
          <?php } ?>

          <?php if ($office_phone) { ?>
          <span class="info phone">
            <a href="tel:<?php echo format_phone_number($office_phone) ?>"><i class="fa-sharp fa-solid fa-phone"></i> <?php echo $office_phone ?></a>
          </span>
          <?php } ?>
        </div>
      
    
        <?php $social_media = get_field('social_media_links', 'option'); ?>
        <?php if ($social_media) { ?>
        <div class="social-media-links">
          <?php foreach ($social_media as $s) { 
            $s_url = $s['url'];
            $s_icon = $s['icon'];
            if($s_url && $s_icon) { 
              $parts = parse_url($s_url);
              $host = str_replace('www.','', $parts['host']);
              $hostStr = explode('.', $host);
              $hostName = ucwords($hostStr[0]); 
              ?>
              <a href="<?php echo $s_url ?>" target="_blank">
                <span class="sr-only">Visit our <?php echo $hostName ?></span>
                <?php echo $s_icon ?>
              </a>
            <?php } ?>
          <?php } ?>
        </div>  
        <?php } ?>

      </div>

    </div>

	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
