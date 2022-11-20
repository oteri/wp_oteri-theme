<?php include('php/utils.php');?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/home.css' ?>" type="text/css">
  <?php wp_head(); ?>
    </head>

    
<div class=header_container>
  <img alt="" src="<?php header_image(); ?>" >
    <?php get_navigation_menu("bottom"); ?>
</div>

<main>
<div class=profile_photo_container><img class="profile_photo" alt="" src="<?php echo get_theme_mod("oteri_profile_photo"); ?>">
<div class=social_network_profiles_menu>
<?php
      $supported_social_networks = array("Github", "Linkedin", "Twitter", "Medium");
      foreach ($supported_social_networks as $network) { 
        $name = 'oteri_'. strtolower($network);
        $url = get_theme_mod($name);
        if($url=="")
            continue;  
        $src = get_template_directory_uri().'/img/'.$network.'.png';
        echo '<div class=item><a target=_blank href='.$url.'><img src='.$src.'></img></a></div>';
      }
?>
</div>
</div>

<div class="description"><?php echo get_theme_mod("oteri_description") ?></div>
</main>