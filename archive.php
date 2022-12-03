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


               <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-sm-4 col-md-4 mb-auto mt-auto">
                        <div class="text-center p-4" > 
                          <?php 
                              if ( has_post_thumbnail() ) {
                                    the_post_thumbnail($size = 'medium');
                                  }   
                          ?>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_content(); ?></p>
                      </div>
                   </div>
                  </div>
              </div>
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