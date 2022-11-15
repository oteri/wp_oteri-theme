<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>

    
<div class=header_container>
  <img alt="" src="<?php header_image(); ?>" >



<?php
$menu=array('About');
$args = array(
   'public'   => true,
   '_builtin' => false
);
 
$output = 'names'; // 'names' or 'objects' (default: 'names')
$operator = 'and'; // 'and' or 'or' (default: 'and')
 
$post_types = get_post_types( $args, $output, $operator );
if ( $post_types ) { // If there are any custom public post types.
     foreach ( $post_types  as $post_type ) {
        array_push( $menu, ucfirst($post_type));
    }
  }

 $menu = array_merge($menu,array('Blog', 'Contact'));
 echo "<div class=menu>";
 foreach ($menu as $item) { 
  echo '<div class=item><a target=_blank href=/'.$item.'>'.$item.'</a></div>';
 }
 echo "</div>";
?>









</div>
<img class="profile_photo" alt="" src="<?php echo get_theme_mod("oteri_profile_photo"); ?>">
<div class="description"><?php echo get_theme_mod("oteri_description") ?></div>
<div class=social_network_profiles_menu>
<?
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