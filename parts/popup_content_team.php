<?php 
$post_id = $post->ID;
$team_img = get_field('photo', $post_id);
$content = apply_filters('the_content', $post->post_content);
$job_title = get_field('job_title', $post_id);
$flexClass = ($team_img) ? 'half':'full';
?>
<div class="popup-content activity">
  <a href="javascript:void(0)" id="closeModalBtn"><span>close</span></a>
  <div class="middle-content">
    <div class="flex-wrap <?php echo $flexClass ?>">
      <?php if ($team_img) { ?>
        <div class="photo">
          <figure>
            <img src="<?php echo $team_img['url']; ?>" alt="<?php echo $post->post_title ?>" />
          </figure>
        </div>
      <?php } ?>
      <div class="text">
        <h2 class="title"><?php echo $post->post_title ?></h2>
        <?php if ( $job_title ) { ?>
          <div class="position"><?php echo $job_title; ?></div>
        <?php }
            if ( $job_title  && $content ) {
              echo '<div class="wave"></div>';
            }
        ?>
        <?php if ( $content ) { ?>
          <div class="description"><?php echo $content; ?></div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
