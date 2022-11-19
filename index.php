<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?php wp_title(''); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
  <?php wp_head(); ?>
</head>
<body>

  <header id="header">
      <h1><?php echo bloginfo('name'); ?></h1>
      <nav id="navigation">
      </nav>
  </header>

  <div id="wrap">
      <section id="content">
	  <?php if(have_posts()) : ?>
   <div id="loop">
       <?php while(have_posts()) : the_post(); ?>
           <article>
               <h1><?php the_title(); ?></h1>
               <p>Publié le <?php the_time('d/m/Y'); ?><?php if(!is_page()) : ?> dans <?php the_category(', '); ?><?php endif; ?></p>
               <?php if(is_singular()) : ?>
                   <?php the_content(); ?>
               <?php else : ?>
                   <?php the_excerpt(); ?>
                   <a href="<?php the_permalink(); ?>">Lire la suite</a>
               <?php endif; ?>
           </article>
       <?php endwhile; ?>
   </div>
   <div id="pagination">
       <?php echo paginate_links(); ?>
   </div>
<?php else : ?>
   <p>Aucun résultat</p>
<?php endif; ?>

      </section>

      <aside id="sidebar">
      </aside>
  </div>

  <footer id="footer">
  </footer>

  <?php wp_footer(); ?>
</body>
</html>