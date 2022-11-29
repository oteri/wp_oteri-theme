<?php include('php/utils.php');?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?php wp_title(''); ?></title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/style.css' ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/collections.css' ?>" type="text/css">
  <?php wp_head(); ?>
</head>
<body>

  <header id="header">
    <?php get_navigation_menu(); ?>
  </header>
    <div id="wrap">
        <section id="content">
          <?php if(have_posts()) : ?>
            <?php
              $name = '';
              if(array_key_exists('category_name',$wp_query->query))
                $name = $wp_query->query['category_name'];
              else
                $name = $wp_query->query['post_type'];
              echo "<h2 class=message> List of the ".$wp_query->post_count." ".$name." I have authored or co-authored so far</h2>" 
            ?>
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
            <h2> No content available</h2>
        <?php endif; ?>
      </section>
      <aside id="sidebar"></aside>
  </div>

  <footer id="footer">
  </footer>
  <?php wp_footer(); ?>
</body>
</html>