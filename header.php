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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>var pageTitle = '<?php get_the_title(); ?>'</script>
<?php 
$page_template = ( get_page_template_slug() ) ? str_replace('.php','',get_page_template_slug()) : '';
$opt = get_landing_page_data();
$navigation = ( isset($opt['navigation']) && $opt['navigation'] ) ? $opt['navigation'] : '';
$landingpageLogo = ( isset($opt['logo']) && $opt['logo'] ) ? $opt['logo'] : '';
$landing_page_home = ( isset($opt['home_url']) && $opt['home_url'] ) ? $opt['home_url'] : '';
$landing_page_home_title = ( isset($opt['home_title']) && $opt['home_title'] ) ? $opt['home_title'] : '';

$post_name = '';
if ( is_single() || is_page() ) { 
  global $post;
  $post_id = $post->ID;
  $thumbId = get_post_thumbnail_id($post_id); 
  $featImg = wp_get_attachment_image_src($thumbId,'full'); 
  $altTitle = get_field('alternative_title',$post_id);
  $pageTitle = ($altTitle) ? $altTitle : get_the_title();
  $post_name = $post->post_name;
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
$getPageTitle = get_the_title();
?>
<body <?php body_class($extra_class); ?>>
<div id="overlay"></div>
<div id="popup-content"></div>

<div id="page" class="site">
	<div id="overlay"></div>
	<a class="skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

  <?php if ( is_front_page() || $post_name=='homepage' ) { ?>
  <header id="masthead" class="site-header-home">
    <div class="wrapper">
      <div class="site-logo">
        <?php if( get_custom_logo() ) { ?>
          <?php the_custom_logo(); ?>
        <?php } ?>
      </div>
    </div>
  </header>
  <?php } else { ?>
  <header id="masthead" class="site-header">
    <div class="wrapper">
      <div class="flexwrap">
        <div class="leftCol">
          <div class="site-logo">
            <?php if ($landingpageLogo && $landing_page_home) { ?>
              <a href="<?php echo $landing_page_home ?>" class="lp-branding">
                <img src="<?php echo $landingpageLogo['url'] ?>" alt="<?php echo $landing_page_home_title ?> Logo" />
              </a>
            <?php } ?>
          </div>
        </div>

        <?php if ($navigation) { ?>
        <div class="rightCol">
          <button class="mobile-menu-toggle" aria-expanded="false" aria-controls="site-navigation">
            <span class="sr-only">Mobile Navigation</span>
            <span class="bar"></span>
          </button>
          <nav id="site-navigation" class="main-navigation" role="navigation">
            <button class="mobile-menu-close"><span class="sr-only">Close Mobile Navigation</span></button>
            <ul class="menu">
              <?php foreach ($navigation as $p) { 
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
                  <li class="menu-item menu-item-has-children <?php if($parentTitle==$getPageTitle){ echo "current-menu-item"; } ?>" tabindex="0">
                  <?php } else { ?>
                  <li class="menu-item <?php if($parentTitle==$getPageTitle){ echo "current-menu-item"; } ?>">
                  <?php } ?>

                  <?php if ($parentUrl=='#') { ?>
                    <a role="button" class="parent-link"><span><?php echo $parentTitle ?><?php echo $waveHover ?></span></a>
                  <?php } else { ?>
                    <a href="<?php echo $parentUrl ?>" target="<?php echo $parentTarget ?>"><span><?php echo $parentTitle ?><?php echo $waveHover ?></span></a>
                  <?php } ?>

                  <?php if ($has_children_menu) { ?>
                    <button class="mobile-dropdown" aria-expanded="false"><i class="fa fa-chevron-down" aria-hidden="true"></i><span class="sr-only">Submenu Items</span></button>
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
        <?php } else { ?>
          <?php  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>false, 'link_before'=>'<span>','link_after'=>'</span><i aria-hidden="true"></i>') ); ?>
        <?php } ?>

      </div>
    </div>
	</header>
  <?php } ?>

  <?php if ( is_front_page() || is_home() ) { ?>
    <?php //get_template_part("parts/hero-home"); ?>
  <?php } else { ?>
    <?php if ( $page_template=='landing-page' ) { ?>
      <?php get_template_part("parts/hero-landing-page"); ?>
    <?php } elseif ( $post_name=='about' ) { ?>
      <?php get_template_part("parts/hero-about-page"); ?>
    <?php } else { ?>
      <?php get_template_part("parts/hero-internal"); ?>
    <?php } ?>
  <?php } ?>

	<div id="content" class="site-content">
