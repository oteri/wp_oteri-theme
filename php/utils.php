<?php
function get_navigation_menu(){
        $menu = array("Home"=>"", "Papers"=>"Papers", "Softwares"=>"Softwares", "Blog"=>"Blog");        
        echo "<div class=menu>";
        foreach ($menu as $name => $url) { 
            echo '<div class=item><a target=_blank href=/'.$url.'>'.$name.'</a></div>';
        }
        echo "</div>";
}
?>