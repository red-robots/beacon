<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>var pageTitle = '<?php get_the_title(); ?>'</script>
<?php 
$page_template = ( get_page_template_slug() ) ? str_replace('.php','',get_page_template_slug()) : '';
$landingpageLogo = '';
$pageTitle = '';
if ( is_single() || is_page() ) { 
global $post;
$post_id = $post->ID;
$thumbId = get_post_thumbnail_id($post_id); 
$featImg = wp_get_attachment_image_src($thumbId,'full'); 
$altTitle = get_field('alternative_title',$post_id);
$pageTitle = ($altTitle) ? $altTitle : get_the_title();
if($page_template=='landing-page') {
  $landingpageLogo = get_field('main_logo', $post_id);
  $navigation = get_field('navigation');
}
?>
<!-- SOCIAL MEDIA META TAGS -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:url"		content="<?php echo get_permalink(); ?>" />
<meta property="og:type"	content="article" />
<meta property="og:title"	content="<?php echo $pageTitle; ?>" />
<meta property="og:description"	content="<?php echo (get_the_excerpt()) ? strip_tags(get_the_excerpt()):''; ?>" />
<?php if ($featImg) { ?>
<meta property="og:image"	content="<?php echo $featImg[0] ?>" />
<?php } ?>
<!-- end of SOCIAL MEDIA META TAGS -->
<?php } ?>
<script>
var siteURL = '<?php echo get_site_url();?>';
var currentURL = '<?php echo get_permalink();?>';
var params={};location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){params[k]=v});
</script>
<?php wp_head(); ?>
</head>
<?php 
$extra_class = array();
if( is_single() || is_page() ) {
  $extra_class[] = ( get_field('hero_image') ) ? 'has-hero-image' : 'no-hero-image';
}


?>
<body <?php body_class($extra_class); ?>>
<div id="page" class="site">
	<div id="overlay"></div>
	<a class="skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

  <?php if ( !is_front_page() && !is_home() ) { ?>
  <header id="masthead" class="site-header">
    <div class="wrapper">
      <div class="flexwrap">
        <div class="leftCol">
          <div class="site-logo">
            <?php if ($landingpageLogo && $page_template=='landing-page') { ?>
              <a hef="<?php bloginfo('url'); ?>" class="lp-branding">
                <img src="<?php echo $landingpageLogo['url'] ?>" alt="<?php echo $pageTitle ?> Logo" />
              </a>
            <?php } else { ?>
              <?php if( get_custom_logo() ) { ?>
                <?php the_custom_logo(); ?>
              <?php } else { ?>
                <a hef="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
              <?php } ?>
            <?php } ?>
          </div>
        </div>

        <?php if ($page_template=='landing-page') {
          $children = get_field('navigation', get_the_ID());
          if($children) { ?>
          <div class="rightCol">
            <nav id="site-navigation" class="main-navigation" role="navigation">
              <ul class="menu">
                <?php foreach ($children as $p) { 
                  $parent = $p['parent_link'];
                  $wave = $p['parent_link_hover_img'];
                  $waveHover = ($wave) ? '<b aria-hidden="true"><i class="wave" aria-hidden="true" style="background-image:url('.$wave['url'].')"></i></b>':'';
                  $parentTitle = ( isset($parent['title']) && $parent['title'] ) ? $parent['title'] : '';
                  $parentUrl = ( isset($parent['url']) && $parent['url'] ) ? $parent['url'] : '';
                  $parentTarget = ( isset($parent['target']) && $parent['target'] ) ? $parent['target'] : '_self';
                  $has_children = $p['has_children'];
                  $dropdownLinks = $p['children_link'];
                  $has_children_menu = ($has_children && $dropdownLinks) ? true : false;
                  if($parentTitle) { ?>
                    <?php if ($has_children_menu) { ?>
                    <li class="menu-item menu-item-has-children" tabindex="0">
                    <?php } else { ?>
                    <li class="menu-item">
                    <?php } ?>

                    <?php if ($parentUrl=='#') { ?>
                      <a role="button" class="parent-link"><span><?php echo $parentTitle ?><?php echo $waveHover ?></span></a>
                    <?php } else { ?>
                      <a href="<?php echo $parentUrl ?>" target="<?php echo $parentTarget ?>"><span><?php echo $parentTitle ?><?php echo $waveHover ?></span></a>
                    <?php } ?>
                    <?php if ($has_children_menu) { ?>
                      <ul class="sub-menu">
                        <?php foreach ($dropdownLinks as $d) { 
                          $sub = $d['link'];
                          $smTitle = ( isset($sub['title']) && $sub['title'] ) ? $sub['title'] : '';
                          $smUrl = ( isset($sub['url']) && $sub['url'] ) ? $sub['url'] : '';
                          $smTarget = ( isset($sub['target']) && $sub['target'] ) ? $sub['target'] : '';
                          if($smTitle && $smUrl) { ?>
                          <li class="sub-menu-item">
                            <a href="<?php echo $smUrl ?>" target="<?php echo $smTarget ?>"><?php echo $smTitle ?></a>
                          </li>
                          <?php } ?>
                        <?php } ?>
                      </ul>
                    <?php } ?>
                  </li>
                  <?php } ?>
                <?php } ?>
              </ul>
            </nav>
          </div>
          <?php } ?>
        <?php } else { ?>
          <?php  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>false, 'link_before'=>'<span>','link_after'=>'</span><i aria-hidden="true"></i>') ); ?>
        <?php } ?>

      </div>
    </div>


    <div class="MobileHeader">
      <button class="mobile-menu-bar" aria-expanded="false" aria-controls="mobile-navigation">
        <span class="sr-only">Mobile Menu Toggle</span>
        <span class="bar"></span>
      </button>

      <div id="mobile-navigation" class="mobile-navigation">
        <div class="mobile-menu-overlay">
          <nav class="mobile-primary-nav">
            <?php  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'mobile-primary-menu','container_class'=>false, 'link_before'=>'<span>','link_after'=>'</span><i aria-hidden="true"></i>') ); ?>
          </nav>
          <button class="mobile-menu-close">
            <span class="sr-only">Close Mobile Navigation</span>
          </button>
        </div>
      </div>
    </div>
	</header>
  <?php } ?>

  <?php if ( is_front_page() || is_home() ) { ?>
    <?php //get_template_part("parts/hero-home"); ?>
  <?php } else { ?>

    <?php if ( $page_template=='landing-page' ) { ?>
      <?php get_template_part("parts/hero-landing-page"); ?>
    <?php } else { ?>
      <?php get_template_part("parts/hero-internal"); ?>
    <?php } ?>

  <?php } ?>

	<div id="content" class="site-content">
