<?php if( have_rows('flexible_content') ) {  ?>
  <div class="flexible-content-wrapper">
    <?php $ctr=1; while( have_rows('flexible_content') ): the_row(); 
    
    include( locate_template('parts-flexible/intro_two_column.php') ); 
    include( locate_template('parts-flexible/featured_image_and_icons.php') ); 
    
    $ctr++; endwhile; ?>
  </div>
<?php } ?>