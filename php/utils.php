<?php
function get_navigation_menu(){
    // TO DO: Moving menu generation to the admin interface rather then hard coding it
    $menu = array("Home"=>"", "Papers"=>"Papers", "Software"=>"Software", "Blog"=>"Blog");        
    $brand_name = 'Francesco Oteri';

    echo '<nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">'.$brand_name.'</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">';

            foreach ($menu as $name => $url) { 
                echo '<li class="nav-item ms-auto"><a class="nav-link" aria-current="page" href=/'.$url.'>'.$name.'</a></li>';
                } 
        echo '
          </ul>
        </div>
      </div>
    </nav>';
}
?>