<img alt="" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>">
<h1>Body</h1>

<?
$supported_social_networks = array("Github", "Linkedin", "Twitter", "Medium");
foreach ($supported_social_networks as $network) { 
  $name = 'oteri_'. strtolower($network);
  echo '<a target=_blank href='.get_theme_mod($name).'>'.$network.'</a><br>';
}
?>