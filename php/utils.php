<?php
// TO DO: Moving menu generation to the admin interface rather then hard coding it
function get_navigation_menu(){
    $items = array("Home"=>"", "Papers"=>"Papers", "Software"=>"Software", "Blog"=>"Blog");        
    get_navbar($items);
}
//Print the navbar which is activated on mobile
function get_navbar($menu){
echo '<nav class="navbar bg-light fixed-top">
<div class="container-fluid justify-content-end">
  <button
    class="navbar-toggler"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasNavbar"
    aria-controls="offcanvasNavbar"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasNavbar"
    aria-labelledby="offcanvasNavbarLabel"
  >
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="offcanvas"
        aria-label="Close"
      ></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">';       
        foreach ($menu as $name => $url) { 
            echo '<li class="nav-item"><a class="nav-link" aria-current="page" href=/'.$url.'>'.$name.'</a></li>';
        }

echo '
      </ul>
    </div>
  </div>
</div>
</nav>
';
}
?>