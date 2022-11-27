<?php include('php/utils.php');?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?php wp_title(''); ?></title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/style.css' ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/papers.css' ?>" type="text/css">
  <?php wp_head(); ?>
</head>
<body>

  <header id="header">
    <?php get_navigation_menu(); ?>
  </header>
    <div id="wrap">
        <section id="content">
        <?php
          $args = array('post_type' => 'papers', 
                        'post_status' => 'public', 
                        'perm' => 'readable');
          $query = new WP_Query( $args );
          echo "<h2 class=message> List of the ".$query->post_count." papers I have authored or co-authored so far</h2>";
        ?>


        <?php if(have_posts()) : ?>
            <div id="loop">
               <?php while(have_posts()) : the_post(); ?>
                   <article>                        
                        <div class=content>
                            <div class=left>
                                <?php if ( has_post_thumbnail() ) {
	                                the_post_thumbnail();
                                    }   
                                ?>
                            </div>
                            <div class=right> 
                              <h1><?php the_title(); ?></h1>
                              <?php the_content(); ?> 
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No paper found</p>
        <?php endif; ?>
      </section>
      <aside id="sidebar"></aside>
  </div>

  <footer id="footer">
  </footer>
  <?php wp_footer(); ?>
</body>
</html>