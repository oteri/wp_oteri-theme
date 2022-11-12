<img src="<?php echo get_theme_mod('oteri_banner'); ?>" />
<h1>Body</h1>

<?
$supported_social_networks = array("Github", "Linkedin", "Twitter", "Medium");
foreach ($supported_social_networks as $network) { 
  $name = 'oteri_'. strtolower($network);
  echo '<a target=_blank href='.get_theme_mod($name).'>'.$network.'</a><br>';
}
?>