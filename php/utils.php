<?php
function get_navigation_menu(){
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
}
?>