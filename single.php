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
          <small><?php the_time('F jS, Y'); ?> at <?php the_time('g:i a'); ?>, filed under: 
          <?php
            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if($categories){
            	foreach($categories as $category) {
            		$output .= '<a class= "post-cat-link" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
            	}
              echo trim($output, $separator);
            }
          ?><br>
          <?php the_tags("Tags: "); ?>
          </small>
          <div class="post-content"><?php the_content(); ?></div>
        </div>
      </article>
      <?php endwhile; ?>
      <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
  
  </section>
  <section id="comments">
    <div id="tag"><i class="fa fa-comments fa-2x"></i> <h2>Comments</h2></div>
    <div id="disqus_thread"></div>
  </section>
</main>

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'mikedettmer';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
<?php get_footer(); ?>