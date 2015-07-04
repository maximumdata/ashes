<?php get_header(); ?>

<main id="single">
  
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
  ?>
  
  <header data-vh="75" <?php if(has_post_thumbnail()) { echo "style=\"background-image: url('".$thumb_url."');\""; } ?>>
    <div id ="info-wrap">
      <h1><?php the_title(); ?></h1>
      <h5><?php the_excerpt(); ?></h5>
      <div id="scroll-click">
        <a href="#post-<?php the_ID(); ?>"><small>Click!</small>
        <div id="arrow">&#x25BC;</a></div>
      </div>
    </div>
  </header>
  <section id="post">
    <article>
      
        <div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
          <h2 class="post-title"><?php the_title(); ?></h2>
          <div class="post-content"><?php the_content(); ?></div>
        </div>
      </article>
      <aside>
          <?php get_sidebar(); ?>
      </aside>
      <?php endwhile; ?>
      <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
  
  </section>
  <section id="comments">
    <!--<div id="tag"><i class="fa fa-comments fa-2x"></i> <h2>Comments</h2></div>
    <div id="disqus_thread"></div>-->
  </section>
</main>

<?php get_footer(); ?>