<?php
// TO DO: Moving menu generation to the admin interface rather then hard coding it
function get_navigation_menu(){
        $menu = array("Home"=>"", "Papers"=>"Papers", "Software"=>"Software", "Blog"=>"Blog");        
        echo "<div class=menu>";
        foreach ($menu as $name => $url) { 
            echo '<div class=item><a target=_blank href=/'.$url.'>'.$name.'</a></div>';
        }
        echo "</div>";
}
?>