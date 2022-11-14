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

<?
$supported_social_networks = array("Github", "Linkedin", "Twitter", "Medium");
foreach ($supported_social_networks as $network) { 
  $name = 'oteri_'. strtolower($network);
  echo '<a target=_blank href='.get_theme_mod($name).'>'.$network.'</a><br>';
}
?>