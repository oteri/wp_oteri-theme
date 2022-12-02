<?php include('php/utils.php');?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title><?php wp_title(''); ?></title>
<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/style.css' ?>" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/home.css' ?>" type="text/css">
<?php wp_head(); ?>
</head>
<body>

<header id="header">
    <?php get_navigation_menu(); ?>
</header>
    
<div class=header_container><img alt="" src="<?php header_image(); ?>" ></div>

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

<footer id="footer">
  </footer>
  <?php wp_footer(); ?>
</body>
</html>