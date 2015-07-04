<?php get_header(); ?>
<main id="index">
  <div id="left-half">
    <ul id="social">
      <li><a href="https://github.com/maximumdata/" target="_blank"><i class="fa fa-github-square fa-3x"></i></a><span class="name">Github</span></li>
      <li><a href="https://www.linkedin.com/pub/michael-dettmer/a8/a81/67b" target="_blank"><i class="fa fa-linkedin-square fa-3x"></i></a><span class="name">LinkedIn</span></li>
      <li><a href="https://www.facebook.com/maximumdata" target="_blank"><i class="fa fa-facebook-square fa-3x"></i></a><span class="name">Facebook</span></li>
      <li><a href="https://twitter.com/DOOM2dotEXE" target="_blank"><i class="fa fa-twitter-square fa-3x"></i></a><span class="name">Twitter</span></li>
      <li><a href="mailto:mike@mikedettmer.com" target="_blank"><i class="fa fa-envelope-square fa-3x"></i></a><span class="name">Email</span></li>
      <li><a href="http://steamcommunity.com/id/galloughs/" target="_blank"><i class="fa fa-steam-square fa-3x"></i></a><span class="name">Steam</span></li>
    </ul>
  </div>
  <div id="right-half">
    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
        $thumb_url = $thumb_url_array[0];
        $categories = get_the_category();
        $separator = ' ';
        $output = '';
        if($categories){
        	foreach($categories as $category) { /*<a class= "post-cat-link" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">*/
        		$output .= '<div class="cat '.str_replace(" ", "-", strtolower($category->cat_name)).'">'.$category->cat_name.'</div>'.$separator;
        	}
        }
        if( get_post_type() == 'projects' ) {
          $output .= '<div class="cat project">Projects</div>';
        }
      ?>
      <article>
        <div class="content">
          <?php echo trim($output, $seperator); ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <!--<p><?php //the_content(); ?></p>-->
          <?php the_excerpt(); ?>
        </div>
      </article>
    <?php endwhile; ?>
    
    <?php else : ?>
      No Posts
    <?php endif; ?>
  </div>
</main>
<div class="hidden-stuff">
  <div class="sidebar-wrap"></div>
  <div id="post"></div>
  <div id="comments"></div>
</div>

<script>
  $(document).keypress((function(e) {
    var pass = "iddqd", typed = "", on = 0;
    return function (e) {
      typed += String.fromCharCode(e.which);
      
      console.log(typed);
      if ( typed === pass && !on ) {
        $('#left-half').addClass('iddqd');
        on = 1;
        typed = "";
      } else if ( typed === pass && on ) {
        $('#left-half').removeClass('iddqd');
        on = 0;
        typed = "";
      }
      if ( typed.length > pass.length ) {
        typed = "";
      }
    };
  })());
</script>
<?php get_footer(); ?>