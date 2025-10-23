<?php if( get_row_layout() == 'layout_3' ) {
  $sidebar_title = get_sub_field('sidebar_title');
  $topics = get_sub_field('topics');

  //print_r($topics);

  if ($topics) { ?>
  <section id="repeatable_<?php echo get_row_layout() ?>_<?php echo $ctr ?>" data-group="<?php echo get_row_layout() ?>" class="repeatable repeatable_<?php echo get_row_layout() ?><?php echo $custom_class; ?> form-page-content page-has-sidebarSticky">
    <div class="wrapper">
      <div class="form-columns">
        <aside class="sidebar sidebarSticky">
          <div class="inside">
            <?php if ($sidebar_title) { ?>
            <h3 class="widget-title"><?php echo $sidebar_title ?></h3>
            <button onclick="dropDownNav()" class="dropbtn widget-title" id="dropbtn"><?php echo $sidebar_title ?> <span class="chevron right"></span></button>
            <?php } ?>
            <ul id="myDropdown" class="quickLinks stickyNav">
            <?php foreach ($topics as $topic) { 
              if( $title = $topic['title'] ) { 
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
          <?php foreach ($topics as $topic) { 
            $title = $topic['title'];
            $description = $topic['text'];
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
            </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>
<?php } ?>
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