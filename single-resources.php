<?php get_header('resources'); ?>

<div id="primary" class="content-area-full form-page-content single-resource-page page-has-sidebarSticky">
	<main id="main" class="site-main" role="main">
    <div class="wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php
        $main_content = get_the_content();
        $formatted_content = apply_filters('the_content', $main_content);

        if( $main_content ){
          echo "<div class='main-content'>". $formatted_content ."</div>";
        }

        $resource_pdf = get_field('pdf');
        
        if( $resource_pdf ){
          $resource_pdf_title = $resource_pdf['title'];
          $resource_pdf_descrption = $resource_pdf['caption'];
          $pdf_resrouce = $resource_pdf['url'];
      ?>
        <div class="main-pdf">
          <a href="<?php echo $pdf_resrouce ?>" class="file-link type-pdf" download>
            <span class="text">
              <?php if ($resource_pdf_title) { ?>
              <span class="file-title"><?php echo $resource_pdf_title ?></span>
              <?php } ?>
              <?php if ($resource_pdf_descrption) { ?>
              <span class="file-description"><?php echo $resource_pdf_descrption ?></span>
              <?php } ?>
            </span>
            <span class="icon icon-pdf"></span>
          </a>
        </div> 
      <?php } ?>
      
      <?php  
        $sidebar_title = get_field('sidebar_title');
        $forms = get_field('forms');
        if($forms) { ?>
        <div class="form-columns">
          <aside class="sidebar sidebarSticky">
            <div class="inside">
              <?php if ($sidebar_title) { ?>
              <h3 class="widget-title"><?php echo $sidebar_title ?></h3>
              <button onclick="dropDownNav()" class="dropbtn widget-title" id="dropbtn"><?php echo $sidebar_title ?> <span class="chevron right"></span></button>
              <?php } ?>
              <ul id="myDropdown" class="quickLinks stickyNav">
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
            <?php
              $top_content = get_field('top_content');
              $bottom_content = get_field('bottom_content');

              $formatted_top_content= apply_filters('the_content', $top_content);
              $formatted_bottom_content= apply_filters('the_content', $bottom_content);

              if($top_content){
                echo $formatted_top_content;
              }
            ?>
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
            <?php }
              if($bottom_content){
                echo '<div class="inforow">'. $formatted_bottom_content .'</div>';
              }
            ?>
          </div>
        </div>
        <?php } ?>
      <?php endwhile; ?>
    </div>
  </main>
</div><!-- #primary -->

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropDownNav() {
  document.getElementById("myDropdown").classList.toggle("show");
  document.getElementById("dropbtn").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
	if (!e.target.matches('.dropbtn')) {
		var myDropdown = document.getElementById("myDropdown");
		var dropdownBtn = document.getElementById("dropbtn");
		if (myDropdown.classList.contains('show')) {
			myDropdown.classList.remove('show');
		}
		if (dropdownBtn.classList.contains('show')) {
			dropdownBtn.classList.remove('show');
		}
	}
}
</script>

<?php
get_footer('resources');