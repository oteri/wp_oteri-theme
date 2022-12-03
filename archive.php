<?php include('php/utils.php');?>
<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?php wp_title(''); ?></title>
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/style.css' ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/collections.css' ?>" type="text/css">
</head>
<body>

  <header id="header">
    <?php get_navigation_menu(); ?>
  </header>

        <section class ="container">
          <?php if(have_posts()) : ?>
            <?php
              $name = '';
              if(array_key_exists('category_name',$wp_query->query))
                $name = $wp_query->query['category_name'];
              else
                $name = $wp_query->query['post_type'];
              echo "<h2 class=message> List of the ".$wp_query->post_count." ".$name." I have authored or co-authored so far</h2>" 
            ?>
               <?php while(have_posts()) : the_post(); ?>              
               <article class="row">
                      <div class="col-sm-12 col-md-12 col-lg-4 text-center">

                              <?php 
                                  if ( has_post_thumbnail() ) {
                                        the_post_thumbnail($size = 'medium');
                                      }   
                              ?>

                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-8 mt-4">
                        <h5 ><?php the_title(); ?></h5>
                        <p ><?php the_content(); ?></p>
                      </div>
              </article>
            <?php endwhile; ?>
        <?php else : ?>
            <h2> No content available</h2>
        <?php endif; ?>
      </section>
      <aside id="sidebar"></aside>
  <footer id="footer">
  </footer>
  <?php wp_footer(); ?>
</body>
</html>