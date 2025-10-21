<?php get_header('resources'); ?>

<div id="primary" class="content-area-full form-page-content">
	<main id="main" class="site-main" role="main">
    <div class="wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php  
      $sidebar_title = get_field('sidebar_title');
      $forms = get_field('forms');
      if($forms) { ?>
      <div class="form-columns">
        <aside class="sidebar">
          <div class="inside">
            <?php if ($sidebar_title) { ?>
            <h3 class="widget-title"><?php echo $sidebar_title ?></h3>
            <?php } ?>
            <ul class="quickLinks">
            <?php foreach ($forms as $frm) { 
              if( $title = $frm['title'] ) { 
                $slug = sanitize_title($title); ?>
                <li>
                  <a href="#<?php echo $slug ?>"><?php echo $title ?></a>
                </li>
              <?php } ?>
            <?php } ?>
            </ul>
          </div>
        </aside>

        <div class="content">
          <?php foreach ($forms as $frm) { 
            $title = $frm['title'];
            $description = $frm['description'];
            $files = $frm['files'];
            $form_slug = ($title) ? sanitize_title($title) : '';
            $content_id = ($form_slug) ? ' id="'.$form_slug.'"' : '';
            if($title || $files) { ?>
            <div class="inforow"<?php echo $content_id ?>>
              <?php if ($title) { ?>
              <h2 class="title"><?php echo $title ?></h2>
              <?php } ?>
              <?php if ($description) { ?>
              <div class="description"><?php echo anti_email_spam($description); ?></div>
              <?php } ?>

              <?php if ($files) { ?>
              <div class="files">
                <ul>
                <?php foreach ($files as $f) { 
                  $file_title = $f['file_title'];
                  $file_description = $f['file_description'];
                  $attachment = $f['attachment'];
                  $pdf = $f['pdf'];
                  $link = $f['link'];
                  if($attachment=='pdf' && $pdf) { ?>
                  <li>
                    <a href="<?php echo $pdf ?>" class="file-link type-pdf" download>
                      <span class="text">
                        <?php if ($file_title) { ?>
                        <span class="file-title"><?php echo $file_title ?></span>
                        <?php } ?>
                        <?php if ($file_description) { ?>
                        <span class="file-description"><?php echo $file_description ?></span>
                        <?php } ?>
                      </span>
                      <span class="icon icon-pdf"></span>
                    </a>
                  </li> 
                  <?php } else { ?>

                    <?php if ($link) { 
                      $x_link = ( isset($link['url']) && $link['url'] ) ? $link['url'] : '';
                      $x_target = ( isset($link['target']) && $link['target'] ) ? $link['target'] : '';
                      if($x_link) { ?>
                      <li>
                        <a href="<?php echo $x_link ?>" target="<?php echo $x_target ?>" class="file-link type-link">
                          <span class="text">
                            <?php if ($file_title) { ?>
                            <span class="file-title"><?php echo $file_title ?></span>
                            <?php } ?>
                            <?php if ($file_description) { ?>
                            <span class="file-description"><?php echo $file_description ?></span>
                            <?php } ?>
                          </span>
                          <span class="icon icon-link"></span>
                        </a>
                      </li>
                      <?php } ?>
                    <?php } ?>

                  <?php } ?>
                <?php } ?>
                </ul>
              </div>
              <?php } ?>
            </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
    <?php endwhile; ?>
    </div>
  </main>
</div><!-- #primary -->

<?php
get_footer('resources');
